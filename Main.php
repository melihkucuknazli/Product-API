<?php

include_once './Cimri.php';
include_once './Facebook.php';
include_once './Google.php';

class Main
{
    public $fileName;
    public static $data;

    public function __construct($fileName = 'products.json')
    {
        $env = parse_ini_file("dev.ini");

        $this->fileName = $fileName;
        self::$data = json_decode($this->fileRead($this->fileName), TRUE);

        $class = $env['company'];
        $instance = new $class(self::$data);
        $instance->getData($instance->dataManipulation($env['priceIncrease']), $env['responseType']);
        return $instance->show();
    }

    private function fileRead($fileName)
    {
        return file_get_contents($fileName);
    }
}

new Main();