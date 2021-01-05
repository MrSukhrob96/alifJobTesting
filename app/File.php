<?php

namespace App;

use App\FileInterface;

class File implements FileInterface
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }
    
    /**
     * if you want to read data from other file sign the parameter $fileName in a function
     * @param string $fileName
     */
    public function read($fileName = '')
    {
        ($fileName === '') ? $this->fileName : $this->fileName = $fileName;

        if (file_exists($this->fileName)) {
            return file($this->fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        }
        return false;
    }

    /**
     * if you want to write data to other file sign the parameter $fileName in a function
     * @param string $fileName
     */
    public function write($data, $fileName = '')
    {
        $this->fileName = ($fileName === '') ? $this->fileName : $this->fileName = $fileName;

        if (file_exists($this->fileName)) {
            $data = implode("\n", $data) . "\n";
            file_put_contents($this->fileName, $data);
            return $data;
        }
        return false;
    }
}
