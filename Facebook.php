<?php

include_once './Response.php';
include_once './ProductInterface.php';

class Facebook extends Response implements ProductInterface
{
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function dataManipulation($priceIncrease)
    {
        foreach ($this->data as $key => $item) {
            $this->data[$key]['price'] = $item['price']*$priceIncrease/100 + $item['price'];
        }
        return $this->data;
    }

}