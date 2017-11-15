<?php


namespace BrainGames\Games\Balance;
use function \Braingames\Cli\game;

const TASK = 'Balance the given number.';
const MIN_VALUE = 1;
const MAX_VALUE = 9999;

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

    $correct = function ($num) {
        return balance($num);
    };

    game($question, $correct, TASK);

    return;
}

/**
 * Balance number
 *
 * @param int $num The number to balance
 *
 * @return string
 */
function balance(int $num) : string
{
    $numbersArray = str_split($num);
    $count = count($numbersArray);

    $middle = array_reduce(
        $numbersArray, function ($a, $b) {
            return $a + $b;
        }, 0
    ) / $count;

    /**
     * Check if all digits should be the same
     */
    if (is_int($middle)) {
        return str_repeat($middle, $count);
    }

    $minPossibleNumber = floor($middle);
    $maxPossibleNumber = ceil($middle);

    $balancer = function ($arr) use (&$balancer, $minPossibleNumber, $maxPossibleNumber) {
        $maxNumberIndex = array_search(max($arr), $arr);
        $minNumberIndex = array_search(min($arr), $arr);
        if ($arr[$maxNumberIndex] > $maxPossibleNumber || $arr[$minNumberIndex] < $minPossibleNumber) {

            $arr[$maxNumberIndex]--;
            $arr[$minNumberIndex]++;
            return $balancer($arr);
        } else {
            natcasesort($arr);
            return implode('', $arr);
        }
    };

    return $balancer($numbersArray);
}
