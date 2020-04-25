<?php

namespace BrainGames\EvenFunctions;

function isEvenNumber(int $number): bool
{
    return $number % 2 === 0;
}

function createArrayWithRandomNumbers(int $length): array
{
    $result = [];
    if ($length <= 0) {
        return $result;
    }
    for ($i = 0; $i < $length; $i++) {
        $result[] = getRandomNumber();
    }

    return $result;
}

function getRandomNumber($min = 10, $max = 100)
{
    return rand($min, $max);
}
