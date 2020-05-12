<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const DESCRIPTION = 'What number is missing in the progression?';

function runProgressionGame()
{
    $gameRounds = [];
    $elementReplacement = '..';
    $progressionLength  = 10;
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $delta                     = rand(1, 5);
        $progression               = range(1, $delta * $progressionLength, $delta);
        $answerIndex               = array_rand($progression);
        $answer                    = $progression[$answerIndex];
        $progression[$answerIndex] = $elementReplacement;
        $question                  = implode(' ', $progression);

        $gameRounds[] = [
            $question,
            (string)$answer,
        ];
    }

    runGame(DESCRIPTION, $gameRounds);
}
