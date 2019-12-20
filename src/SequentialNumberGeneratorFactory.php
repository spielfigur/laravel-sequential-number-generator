<?php

namespace Spielfigur\LaravelSequentialNumberGenerator;

class SequentialNumberGeneratorFactory
{
    public function generateNumber($string, $separator = '', $position = '', $fixedNumberLength = '')
    {
        if ($separator === '') {
            $separator = config('sequential-number-generator.separator');
        }
        if ($position === '') {
            $position = config('sequential-number-generator.position');
        }
        if ($fixedNumberLength === '') {
            $fixedNumberLength = config('sequential-number-generator.fixed_number_length');
        }
        $a = explode($separator, $string);
        $currentNumber = $a[$position];
        if (! preg_match('/[0-9]/', $currentNumber)) {
            return 'number not found? must be an integer!';
        }
        ($currentNumber == (str_repeat('9', $fixedNumberLength))) ? $currentNumber = str_repeat('0', $fixedNumberLength) : $currentNumber++;
        $currentNumber = sprintf("%'.0".$fixedNumberLength.'d', $currentNumber);
        $a[$position] = $currentNumber;

        return implode($separator, $a);
    }
}
