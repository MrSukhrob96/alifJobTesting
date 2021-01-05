<?php

namespace App;

use App\CalcInterface;

class Calculator implements CalcInterface
{

    private $operation;

    public function __construct($operation)
    {
        $this->operation = $operation;
    }

    /**
     * The calculate function takes a numeric array parameter of two values
     * @param string $numbers
     */
    public function calculate($numbers)
    {
        if (count($numbers) !== 2) return false;

        list($first, $second) = $numbers;

        switch ($this->operation) {
            case '+':
                return $first + $second;
                break;
            case '/':
                return $first / $second;
                break;
            case '*':
                return $first * $second;
                break;
            case '-':
                return $first - $second;
                break;
        }
    }
}
