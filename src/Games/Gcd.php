<?php


namespace BrainGames\Games\Gcd;
use function \Braingames\Cli\game;

const TASK = 'Find the greatest common divisor of given numbers.';
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
        return rand(MIN_VALUE, MAX_VALUE) . ' ' . rand(MIN_VALUE, MAX_VALUE);
    };

    $isCorrect = function (string $expression) {
        return gcd($expression);
    };

    game($question, $isCorrect, TASK);

    return;
}

/**
 * Find gcd
 *
 * @param string $nums string with two numbers
 *
 * @return string
 */
function gcd(string $nums) : string
{
    list($firstArgument, $secondArgument) = explode(" ", $nums);

    $findGcd = function ($firstArgument, $secondArgument) use (&$findGcd) {
        return $secondArgument ?
            $findGcd($secondArgument, $firstArgument % $secondArgument) :
            $firstArgument;
    };

    return (string)$findGcd($firstArgument, $secondArgument);
}
