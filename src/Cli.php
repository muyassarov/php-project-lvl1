<?php

/**
 * Functions
 *
 * List of functions
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

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Prompt user name and print it back to the console
 *
 * @return void
 */
function run()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
