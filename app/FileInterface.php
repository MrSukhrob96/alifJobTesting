<?php
namespace App;

interface FileInterface
{
    public function read($fileName);
    public function write($data, $fileName);
}
