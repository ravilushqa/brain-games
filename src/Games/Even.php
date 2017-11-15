<?php


namespace BrainGames\Games\Even;
use function \Braingames\Cli\game;

const TASK = 'Answer "yes" if number even otherwise answer "no"';
const MIN_VALUE = 1;
const MAX_VALUE = 100;

/**
 * Runs game
 *
 * @return void;
 */
function run()
{
    $question = function () {
        return rand(MIN_VALUE, MAX_VALUE);
    };

    $isCorrect = function ($num) {
        return isEven($num);
    };

    game($question, $isCorrect, TASK);

    return;
}

/**
 * Checks for even number
 *
 * @param int $num The number to check
 *
 * @return string
 */
function isEven(int $num) : string
{
    return $num % 2 ? 'yes' : 'no';
}
