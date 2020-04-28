<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Functions\calculateMathOperation;
use function BrainGames\Functions\getRandomOperation;
use function BrainGames\Game\runGame;
use function BrainGames\Functions\getRandomNumber;

const GREETINGS = 'What is the result of the expression?';

function calcGame($numberOfQuestions)
{
    runGame(GREETINGS, createArrayQuestions($numberOfQuestions));
}

function createArrayQuestions($numberOfQuestions)
{
    $result = [];
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $question = getQuestion();
        $result[$question['index']] = $question['result'];
    }
    return $result;
}

function getQuestion(): array
{
    $variable1 = getRandomNumber(1, 10);
    $variable2 = getRandomNumber(1, 15);
    $operation = getRandomOperation();
    return [
        'index' => "{$variable1} {$operation} {$variable2}",
        'result' => (string)calculateMathOperation($variable1, $variable2, $operation)
    ];
}
