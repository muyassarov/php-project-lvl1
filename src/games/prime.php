<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Game\runGame;

use const BrainGames\Game\NUMBER_ROUNDS;

const DESCRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";

function runPrimeGame()
{
    runGame(DESCRIPTION, createArrayQuestions(NUMBER_ROUNDS));
}

function createArrayQuestions($countQuestions)
{
    $result = [];
    for ($i = 0; $i < $countQuestions; $i++) {
        $question          = rand(2, 100);
        $answer            = isPrime($question) ? 'yes' : 'no';
        $result[$question] = $answer;
    }

    return $result;
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    // default denom "1"
    $countDemons = 1;
    for ($i = 2; $i <= floor($number / 2); $i++) {
        if ($number % $i === 0) {
            $countDemons++;
        }
        if ($countDemons > 1) {
            return false;
        }
    }

    return  true;
}
