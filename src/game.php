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

namespace BrainGames\Game;

use function cli\line;
use function cli\prompt;

/**
 * Prompt user name and print it back to the console
 *
 * @param string $name
 * @param string $greetingsText
 * @param array $questions
 *
 * @return void
 */
function runGame(string $name, string $greetingsText, array $questions)
{
    line($greetingsText);
    foreach ($questions as $question => $correctAnswer) {
        $answer = prompt("Question: $question");
        line("Your answer: %s", $answer);
        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            exit(0);
        }
        line('Correct!');
    }

    line("Congratulations, %s!", $name);
}
