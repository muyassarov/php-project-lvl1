<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Functions\createProgression;
use function BrainGames\Game\runGame;

const GREETINGS = "What number is missing in the progression?\n";

function progressionGame(int $countQuestions)
{
    runGame(GREETINGS, createArrayQuestions($countQuestions));
}

function createArrayQuestions($countQuestions)
{
    $stepFunctions    = [
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
    $maxIndex         = count($stepFunctions) - 1;
    $progressionArray = [];
    $result           = [];
    for ($i = 0; $i < $countQuestions; $i++) {
        $stepFunction       = $stepFunctions[rand(0, $maxIndex)];
        $progressionArray[] = createProgression($stepFunction);
    }

    foreach ($progressionArray as $item) {
        $result = array_merge($result, createQuestion($item));
    }

    return $result;
}

function createQuestion(array $progression): array
{
    $countElements = count($progression);
    $fromRand      = $countElements >= 10 ? 2 : 0;
    $toRand        = $countElements >= 10 ? $countElements - 2 : $countElements;
    $index         = rand($fromRand, $toRand);
    $answer        = $progression[$index];

    $progression[$index] = '..';

    return [
        implode(' ', $progression) => (string)$answer,
    ];
}
