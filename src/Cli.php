<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const ANSWER_COUNT = 3;

/**
 * Run game
 *
 * @return void
 */
function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}

/**
 * Introduction for user
 *
 * @param string $task Task for user
 *
 * @return void
 */
function intro(string $task)
{
    line('Welcome to the Brain Game!');
    line($task);
    line();
}

/**
 * Run the game
 *
 * @param callable $question   question for user
 * @param callable $trueAnswer true answer
 * @param string   $task       Task for user
 * 
 * @return void
 */
function game(callable $question, callable $trueAnswer, string $task)
{
    intro($task);
    $name = getName();

    for ($i=0; $i < ANSWER_COUNT; $i++) {
        $issue = $question();
        line("Question: $issue");
        $answer = prompt('Your answer');
        if ($answer === $trueAnswer($issue)) {
            line('Correct!');
            continue;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '{$trueAnswer($issue)}'.");
            line("Let's try again, $name");
            return;
        }
    }
    line("Congratulations, %s!", $name);
    return;
}

/**
 * Get user name
 *
 * @return string
 */
function getName()
{
    $name = ucfirst(prompt('May I have your name?'));
    line("Hello, %s", $name);
    line();
    return $name;
}
