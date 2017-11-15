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
        list($firstNumber, $secondNumber) = explode(" ", $expression);

        return gcd($firstNumber, $secondNumber);
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
 * @param int $firstNumber
 * @param int $secondNumber
 * @return int
 */
function gcd(int $firstNumber, int $secondNumber) : int
{
    $findGcd = function ($firstNumber, $secondNumber) use (&$findGcd) {
        return $secondNumber ? $findGcd($secondNumber, $firstNumber % $secondNumber) : $firstNumber;
    };

    return $findGcd($firstNumber, $secondNumber);
}
