<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Logger;

try {
    (new Logger('test.txt', '+'))->logWriter();
} catch (Exception $ex) {
    echo $ex->getMessage();
}
