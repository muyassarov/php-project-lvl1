<?php

/**
 * BrainGames
 *
 * Game is number is even?
 * php version 7.0.33
 *
 * @category   Functions
 * @package    PhpProjectLevel1
 * @subpackage Theme_Name_Here
 * @author     Behruz Muyassarov <muyassarov@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://muyassarov.github.io/
 * @since      1.0.0
 */

namespace BrainGames\Games\Even;

use function BrainGames\Game\runGame;
use function BrainGames\Functions\getRandomNumber;

const GREETINGS = "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";

/**
 * Run brain even game
 *
 * @param string $name
 * @param int $countQuestions
 *
 * @return void
 */
function evenGame(string $name, int $countQuestions)
{
    runGame($name, GREETINGS, createArrayQuestions($countQuestions));
}

function createArrayQuestions($countQuestions)
{
    $array  = createArrayWithRandomNumbers($countQuestions);
    $result = [];
    foreach ($array as $item) {
        $result[$item] = isEvenNumber($item) ? 'yes' : 'no';
    }
    return $result;
}

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
