<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Functions\getRandomNumber;
use function BrainGames\Functions\isPrime;
use function BrainGames\Game\runGame;

const GREETINGS = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";
const NUMBER_QUESTIONS = 3;

function primeGame()
{
    runGame(GREETINGS, createArrayQuestions(NUMBER_QUESTIONS));
}

function createArrayQuestions($countQuestions)
{
    $result = [];
    for ($i = 0; $i < $countQuestions; $i++) {
        $number          = getRandomNumber(2, 100);
        $result[$number] = isPrime($number) ? 'yes' : 'no';
    }

    return $result;
}
