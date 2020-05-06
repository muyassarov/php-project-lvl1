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

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

/**
 * Run brain-even game
 *
 * @return void
 */
function runEvenGame()
{
    $gameRounds = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $question     = rand(1, 100);
        $answer       = isEvenNumber($question) ? 'yes' : 'no';
        $gameRounds[] = [
            'question' => $question,
            'answer'   => $answer,
        ];
    }

    runGame(DESCRIPTION, $gameRounds);
}

function isEvenNumber(int $number): bool
{
    return $number % 2 === 0;
}
