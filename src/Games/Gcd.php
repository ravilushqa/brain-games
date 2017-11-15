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

    $answer = function (string $expression) : string {
        list($firstArgument, $secondArgument) = explode(" ", $expression);

        return gcd($firstArgument, $secondArgument);
    };

    $questionAndAnswer = function () use ($question, $answer) {
        $generatedQuestion = $question();
        $generatedAnswer = $answer($generatedQuestion);

        return [
            'question' => (string) $generatedQuestion,
            'answer' => (string) $generatedAnswer
        ];
    };

    game($questionAndAnswer, TASK);

    return;
}

/**
 * Find gcd
 *
 * @param int $firstArgument
 * @param int $secondArgument
 * @return int
 */
function gcd(int $firstArgument, int $secondArgument) : int
{
    $findGcd = function ($firstArgument, $secondArgument) use (&$findGcd) {
        return $secondArgument ? $findGcd($secondArgument, $firstArgument % $secondArgument) : $firstArgument;
    };

    return $findGcd($firstArgument, $secondArgument);
}
