<?php
namespace App\Services;

use App\Interfaces\Calculation;

class Add implements Calculation
{

    public function run($number1, $number2): int|float
    {
        return $number1 + $number2;
    }
}