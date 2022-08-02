<?php
namespace App\Services;

class Substract implements \App\Interfaces\Calculation
{
    public function run($number1, $number2): int|float
    {
        return $number1 - $number2;
    }
}