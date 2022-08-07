<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\evenIteration;
use function BrainGames\Games\calcIteration;
use function BrainGames\Games\gcdIteration;
use function BrainGames\Games\progressionIteration;
use function BrainGames\Games\primeIteration;

function greeting()
{
    line('Welcome to the Brain Game!');
    global $name;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}

function task(string $text)
{
    line($text);
}

function gameProcess(string $gameName)
{
    global $name;
    for ($rightAnswerCount = 1; $rightAnswerCount < 4; $rightAnswerCount++) {
        switch ($gameName) {
            case 'even':
                $result = evenIteration();
                break;
            case 'calc':
                $result = calcIteration();
                break;
            case 'gcd':
                $result = gcdIteration();
                break;
            case 'progression':
                $result = progressionIteration();
                break;
            case 'prime':
                $result = primeIteration();
                break;
        }
        if ($result === "Mistake") {
            line('Let\'s try again, %s!', $name);
            break;
        }
        line('Correct!');
        if ($rightAnswerCount === 3) {
            line('Congratulations,  %s!', $name);
        }
    }
}
