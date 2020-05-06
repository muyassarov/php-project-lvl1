<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function runGcdGame()
{
    $gameRounds = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $operand1 = (string)rand(10, 100);
        $operand2 = (string)rand(20, 100);

        $question     = "{$operand1} {$operand2}";
        $answer       = (string)gmp_gcd($operand1, $operand2);
        $gameRounds[] = [
            'question' => $question,
            'answer'   => $answer,
        ];
    }

    runGame(DESCRIPTION, $gameRounds);
}
