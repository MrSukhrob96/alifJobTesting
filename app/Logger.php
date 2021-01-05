<?php

namespace App;

use App\Calculator;
use App\File;
use Exception;

class Logger
{

    private $file;
    private $calc;

    public function __construct($fileName, $operatin)
    {
        $this->file = new File($fileName);
        $this->calc = new Calculator($operatin);
    }

    public function logWriter()
    {
        $array = $this->file->read();
        if (!$array) {
            throw new Exception('File is empty');
        }

        $data = $this->splitNumbers($array);

        $this->file->write($data['negative'], 'negative.txt');
        $this->file->write($data['positive'], 'positive.txt');
    }

    private function splitNumbers($array)
    {
        if (!is_array($array)) return false;

        $arr = $this->adjustmentNumbers($array);

        return array(
            'negative' => array_filter($arr, function ($num) {
                return $num >= 0;
            }),
            'positive' => array_filter($arr, function ($num) {
                return $num < 0;
            })
        );
        $this->file->read();
    }

    private function adjustmentNumbers($array)
    {
        return array_map(function ($item) {
            return $this->calc->calculate(explode(' ', trim($item)));
        }, $array);
    }
}
