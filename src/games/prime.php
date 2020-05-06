<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const DESCRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

function runPrimeGame()
{
    $gameRounds = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $question     = rand(2, 100);
        $answer       = isPrime($question) ? 'yes' : 'no';
        $gameRounds[] = [
            'question' => $question,
            'answer'   => $answer,
        ];
    }

    runGame(DESCRIPTION, $gameRounds);
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

    return true;
}
