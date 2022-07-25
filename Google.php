<?php

include_once './Response.php';
include_once './ProductInterface.php';

class Google extends Response implements ProductInterface
{

    public function  __construct($data)
    {
        $this->data = $data;
    }

    public function dataManipulation($priceIncrease)
    {
        foreach ($this->data as $key => $item) {
            $this->data[$key]['quantity'] = $item['price'];
            unset($this->data[$key]['price']);
        }
        return $this->data;
    }

}
