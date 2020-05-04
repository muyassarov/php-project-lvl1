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

use const BrainGames\Game\NUMBER_ROUNDS;

const DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";

/**
 * Run brain even game
 *
 * @return void
 */
function runEvenGame()
{
    runGame(DESCRIPTION, createArrayQuestions(NUMBER_ROUNDS));
}

function createArrayQuestions($countQuestions)
{
    $questions = [];
    if ($countQuestions <= 0) {
        return $questions;
    }
    for ($i = 0; $i < $countQuestions; $i++) {
        $question             = rand(1, 100);
        $answer               = isEvenNumber($question) ? 'yes' : 'no';
        $questions[$question] = $answer;
    }

    return $questions;
}

function isEvenNumber(int $number): bool
{
    return $number % 2 === 0;
}
