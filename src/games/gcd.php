<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Game\runGame;

use const BrainGames\Game\NUMBER_ROUNDS;

const DESCRIPTION = "Find the greatest common divisor of given numbers.\n";

function runGcdGame()
{
    runGame(DESCRIPTION, createArrayQuestions(NUMBER_ROUNDS));
}

function createArrayQuestions($numberOfQuestions)
{
    $questions = [];
    if (!$numberOfQuestions) {
        return $questions;
    }

    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $operand1 = (string)rand(10, 100);
        $operand2 = (string)rand(20, 100);

        $question = "{$operand1} {$operand2}";
        $answer   = (string)gmp_gcd($operand1, $operand2);
        $questions[$question] = $answer;
    }

    return $questions;
}
