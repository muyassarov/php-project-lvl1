<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const DESCRIPTION         = "What number is missing in the progression?";
const ELEMENT_REPLACEMENT = '..';

function runProgressionGame()
{
    $gameRounds   = [];
    $progressions = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $progressions[] = createProgression();
    }

    foreach ($progressions as $progression) {
        $answerIndex               = array_rand($progression);
        $answer                    = $progression[$answerIndex];
        $progression[$answerIndex] = ELEMENT_REPLACEMENT;
        $question                  = implode(' ', $progression);

        $gameRounds[] = [
            'question' => $question,
            'answer'   => (string)$answer,
        ];
    }

    runGame(DESCRIPTION, $gameRounds);
}

function createProgression(int $countElements = 10): array
{
    $progression = [];
    $item        = rand(1, 10);
    $delta       = rand(1, 5);
    for ($i = 0; $i < $countElements; $i++) {
        $progression[] = $item;
        $item          = $item + $delta;
    }
    return $progression;
}
