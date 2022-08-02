<?php
namespace App\Services;


use App\Interfaces\Calculation;

class Calculator
{
    protected $result;
    protected Calculation $operation;

    public function __construct(Calculation $operation)
    {
        $this->operation = $operation;
    }

    public function calculate($number1, $number2): void
    {
        $this->result = $this->operation->run($number1, $number2);
    }

    public function getResult()
    {
        return $this->result;
    }



}