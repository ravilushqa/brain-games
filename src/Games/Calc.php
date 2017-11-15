<?php


namespace BrainGames\Games\Calc;
use function \Braingames\Cli\game;

const TASK = 'What is the result of the expression?';
const MIN_VALUE = 1;
const MAX_VALUE = 100;
const SIGNS = ['+', '-', '*'];

/**
 * Runs game
 *
 * @return void;
 */
function run()
{
    $question = function () {
        return rand(MIN_VALUE, MAX_VALUE) . ' ' . SIGNS[array_rand(SIGNS)] . ' ' . rand(MIN_VALUE, MAX_VALUE);
    };

    $isCorrect = function (string $expression) {
        return solveExpression($expression);
    };

    game($question, $isCorrect, TASK);

    return;
}

/**
 * Solve expression
 *
 * @param string $exp Solve expression
 *
 * @return mixed
 */
function solveExpression(string $exp) : string
{
    list($firstArgument, $sign, $secondArgument) = explode(" ", $exp);

    switch ($sign)
    {
    case '+':
        return $firstArgument + $secondArgument;
            break;

    case '-':
        return $firstArgument - $secondArgument;
            break;

    case '*':
        return $firstArgument * $secondArgument;
            break;

    case '/':
        return $firstArgument / $secondArgument;
            break;

    default:
        return "Sorry No command found";
    }
}
