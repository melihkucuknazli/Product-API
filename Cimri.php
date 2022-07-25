<?php

include_once './Response.php';
include_once './ProductInterface.php';

class Cimri extends Response implements ProductInterface
{

    public function  __construct($data)
    {
        $this->data = $data;
    }

    public function dataManipulation($priceIncrease)
    {
        return $this->data;
    }

}