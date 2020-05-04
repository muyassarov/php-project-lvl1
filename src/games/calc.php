<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Game\runGame;

use const BrainGames\Game\NUMBER_ROUNDS;

const DESCRIPTION  = "What is the result of the expression?\n";

function runCalcGame()
{
    runGame(DESCRIPTION, createArrayQuestions(NUMBER_ROUNDS));
}

function createArrayQuestions($numberQuestions)
{
    $questions = [];
    $operators = ['*', '+', '-'];
    for ($i = 0; $i < $numberQuestions; $i++) {
        $operand1 = rand(1, 10);
        $operand2 = rand(1, 15);
        $operator = $operators[array_rand($operators)];
        $question = "{$operand1} {$operator} {$operand2}";
        $answer   = (string)calculateMathExpression($operand1, $operand2, $operator);

        $questions[$question] = $answer;
    }
    return $questions;
}

function calculateMathExpression($operand1, $operand2, $operator): int
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand2;
        default:
            throw new \Exception("Unknown operator: {$operator}");
            break;
    }
}
