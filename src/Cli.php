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
 * @param callable $getQuestionAndAnswer
 * @param string $task
 */
function game(callable $getQuestionAndAnswer, string $task)
{
    intro($task);
    $name = getName();

    for ($i=0; $i < ANSWER_COUNT; $i++) {
        $generatedQuestionAndAnswer = $getQuestionAndAnswer();
        $question = $generatedQuestionAndAnswer['question'];
        $answer = $generatedQuestionAndAnswer['answer'];
        line("Question: $question");
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $answer) {
            line('Correct!');
            continue;
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$answer'.");
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
