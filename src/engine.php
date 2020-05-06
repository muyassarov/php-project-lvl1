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

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

/**
 * Game engine
 *
 * @param string $description
 * @param array $questionsAnswers
 *
 * @return void
 */
function runGame(string $description, array $questionsAnswers)
{
    line("Welcome to the Brain Games!");
    line("$description\n");

    $name = prompt('May I have your name?');
    line("Hello, $name!\n");

    foreach ($questionsAnswers as $round) {
        ['question' => $question, 'answer' => $correctAnswer] = $round;

        line("Question: $question");
        $answer = prompt('Your answer');
        if ($answer !== $correctAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }
        line('Correct!');
    }

    line("Congratulations, $name!");
}
