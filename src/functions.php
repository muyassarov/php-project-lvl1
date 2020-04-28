<?php

namespace BrainGames\Functions;

use function cli\line;
use function cli\prompt;

function askUsername(): string
{
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);
    return $name;
}

function getRandomNumber($min = 10, $max = 100)
{
    return rand($min, $max);
}

function getRandomOperation()
{
    $operations = ['*', '+', '-'];
    return $operations[rand(0, count($operations) - 1)];
}

function calculateMathOperation($var1, $var2, $operation): int
{
    switch ($operation) {
        case '+':
            return $var1 + $var2;
            break;
        case '-':
            return $var1 - $var2;
            break;
        case '*':
            return $var1 * $var2;
            break;
    }
}
