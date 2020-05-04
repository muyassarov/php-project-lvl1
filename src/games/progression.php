<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Game\runGame;

use const BrainGames\Game\NUMBER_ROUNDS;

const DESCRIPTION = "What number is missing in the progression?\n";

function runProgressionGame()
{
    runGame(DESCRIPTION, createArrayQuestions(NUMBER_ROUNDS));
}

function createArrayQuestions($countQuestions)
{
    $stepFunctions = [
        function ($item) {
            return $item * 2;
        },
        function ($item) {
            return $item + 2;
        },
        function ($item) {
            return $item + 1;
        },
        function ($item) {
            return $item + 3;
        },
    ];
    $maxIndex      = count($stepFunctions) - 1;
    $progressions  = [];
    $questions     = [];
    for ($i = 0; $i < $countQuestions; $i++) {
        $stepFunction   = $stepFunctions[rand(0, $maxIndex)];
        $progressions[] = createProgression($stepFunction);
    }

    foreach ($progressions as $progression) {
        $answer_index               = array_rand($progression);
        $answer                     = $progression[$answer_index];
        $progression[$answer_index] = '..';
        $question                   = implode(' ', $progression);

        $questions[$question] = (string)$answer;
    }

    return $questions;
}

function createProgression(callable $func, int $countElements = 10): array
{
    $progression = [];
    $item        = rand(1, 10);
    for ($i = 0; $i < $countElements; $i++) {
        $progression[] = $item;
        $item          = $func($item);
    }
    return $progression;
}
