<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Functions\getRandomNumber;
use function BrainGames\Game\runGame;

const GREETINGS = "Find the greatest common divisor of given numbers.";

function gcdGame(int $numberOfQuestions)
{
    runGame(GREETINGS, createArrayQuestions($numberOfQuestions));
}

function createArrayQuestions($numberOfQuestions)
{
    $result = [];
    if (!$numberOfQuestions) {
        return $result;
    }

    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $result = array_merge($result, getQuestion());
    }

    return $result;
}

function getQuestion()
{
    $var1 = (string)getRandomNumber(10, 100);
    $var2 = (string)getRandomNumber(20, 100);

    $question = "{$var1} {$var2}";

    return [
        $question => (string)gmp_gcd($var1, $var2)
    ];
}
