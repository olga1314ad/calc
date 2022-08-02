<?php
namespace App\Services;

class Divide implements \App\Interfaces\Calculation
{
    public function run($number1, $number2): string|int|float
    {
        if($number2 != 0){
            return $number1 / $number2;
        }
        else{
            return "Деление на ноль!";
        }

    }
}