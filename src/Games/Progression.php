<?php

namespace BrainGames\Games\Progression;

use function \Braingames\Cli\game;

const TASK = 'What number is missing in this progression?';
const MIN_START_POINT_VALUE = 0;
const MAX_START_POINT_VALUE = 100;
const MIN_STEP_VALUE = 1;
const MAX_STEP_VALUE = 10;
const PROGRESSION_ELEMENTS = 10;
const INDEX_TO_CATCH = 4;

/**
 * Runs game
 *
 * @return void;
 */
function run()
{
    $questionAndAnswer = function () {
        $startPoint = rand(MIN_START_POINT_VALUE, MAX_START_POINT_VALUE);
        $step = rand(MIN_STEP_VALUE, MAX_STEP_VALUE);
        $endPoint = $startPoint + (PROGRESSION_ELEMENTS * $step - 1);

        $progression = range($startPoint, $endPoint, $step);
        $answer = $progression[INDEX_TO_CATCH];
        $progression[INDEX_TO_CATCH] = '..';

        $progression = implode(' ', $progression);

        return [
            'question' => (string) $progression,
            'answer' => (string) $answer
        ];
    };

    game($questionAndAnswer, TASK);

    return;
}
