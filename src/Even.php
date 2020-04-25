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

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\EvenFunctions\createArrayWithRandomNumbers;
use function BrainGames\EvenFunctions\isEvenNumber;

/**
 * Prompt user name and print it back to the console
 *
 * @param int $countQuestions
 * @param string $name
 *
 * @return void
 */
function startGame(int $countQuestions, string $name = 'Unknown')
{
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");

    $randomNumbers = createArrayWithRandomNumbers($countQuestions);
    foreach ($randomNumbers as $number) {
        $isEvenNumber  = isEvenNumber($number);
        $answer        = prompt("Question: $number");
        $correctAnswer = $isEvenNumber ? 'yes' : 'no';

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

function askUsername(): string
{
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);
    return $name;
}
