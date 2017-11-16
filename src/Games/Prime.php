<?php

namespace BrainGames\Games\Prime;

use function \Braingames\Cli\game;

const TASK = 'Is number prime?';
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

    $answer = function ($num) : string {
        return isPrime($num) ? 'yes' : 'no';
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

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    $isPrime = function ($number, $div = 2) use (&$isPrime) {
        if ($div === $number) {
            return true;
        }

        if ($number % $div === 0) {
            return false;
        } else {
            return $isPrime($number, $div + 1);
        }
    };

    return $isPrime($number);
}
