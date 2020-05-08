<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runPrimeGame()
{
    $gameRounds = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $question     = rand(2, 100);
        $answer       = isPrime($question) ? 'yes' : 'no';
        $gameRounds[] = [
            $question,
            $answer,
        ];
    }

    runGame(DESCRIPTION, $gameRounds);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
