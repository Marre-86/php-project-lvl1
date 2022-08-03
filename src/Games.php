<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;

function evenIteration()
{
    $randNumber = rand(0, 100);
    line("Question: %d", $randNumber);
    $answer = prompt("Your answer");
    if ((($randNumber % 2 === 0) and ($answer === "yes")) or (($randNumber % 2 !== 0) and ($answer === "no"))) {
        return "Right!";
    } else {
        return "Mistake";
    }
}

function even()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($rightAnswerCount = 1; $rightAnswerCount < 4; $rightAnswerCount ++)
    {
        $result = evenIteration();
        if ($result === "Mistake") {
             line("'yes' is wrong answer ;(. Correct answer was 'no'.");
             line('Let\'s try again, %s!', $name);
             break;
        }
        line('Correct!');
        if ($rightAnswerCount === 3) {
            line('Congratulations,  %s!', $name);
        }
    }
}
