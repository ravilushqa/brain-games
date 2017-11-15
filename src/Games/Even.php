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

    $answer = function ($num) : string {
        return isEven($num) ? 'yes' : 'no';
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
 * @param int $num
 * @return bool
 */
function isEven(int $num) : bool
{
    return $num % 2;
}
