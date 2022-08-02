<?php
namespace App\Services;

class Multiply implements \App\Interfaces\Calculation
{
    public function run($number1, $number2): int|float
    {
        return $number1 * $number2;
    }
}