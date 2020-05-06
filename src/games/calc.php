<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const DESCRIPTION = "What is the result of the expression?";
const OPERATORS   = [
    '*',
    '+',
    '-',
];

function runCalcGame()
{
    $gameRounds = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $operand1 = rand(1, 10);
        $operand2 = rand(1, 15);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "{$operand1} {$operator} {$operand2}";
        $answer   = (string)calculateMathExpression($operand1, $operand2, $operator);

        $gameRounds[] = [
            'question' => $question,
            'answer'   => $answer,
        ];
    }

    runGame(DESCRIPTION, $gameRounds);
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
    }
}
