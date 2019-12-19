<?php

namespace Spielfigur\LaravelSequentialNumberGenerator;

class SequentialNumberFactory
{
    public function generateNumber($string, $separator, $position, $fixedNumberLength)
    {
        $a             = explode($separator, $string);
        $currentNumber = $a[$position];
        if (!preg_match('/[0-9]/', $currentNumber)) {
            return 'number not found? must be an integer!';
        }
        ($currentNumber == (str_repeat('9', $fixedNumberLength))) ? $currentNumber = str_repeat('0', $fixedNumberLength) : $currentNumber++;
        $currentNumber                                                             = sprintf("%'.0" . $fixedNumberLength . 'd', $currentNumber);
        $a[$position]                                                              = $currentNumber;

        return implode($separator, $a);
    }
}
