<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Functions\calculateMathOperation;
use function BrainGames\Functions\getRandomOperation;
use function BrainGames\Game\runGame;
use function BrainGames\Functions\getRandomNumber;

const GREETINGS = "What is the result of the expression?\n";
const NUMBER_QUESTIONS = 3;

function calcGame()
{
    runGame(GREETINGS, createArrayQuestions(NUMBER_QUESTIONS));
}

function createArrayQuestions($numberQuestions)
{
    $result = [];
    for ($i = 0; $i < $numberQuestions; $i++) {
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
