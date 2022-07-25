<?php

class Response
{

    public function getData($data, $dataType)
    {
        $dataType = strtolower($dataType);
        $this->dataType = $dataType;
        $convertData = $data;

        if ($dataType == 'json') {
            $convertData = json_encode($convertData);
        }

        if ($dataType == 'xml') {
            $convertData = $data;
            $convertData = $this->arr2xml($convertData, new SimpleXMLElement('<products/>'));
        }
        $this->data = $convertData;
        return $convertData;
    }

    public function arr2xml($array, $xml)
    {
        foreach ($array as $key => $val) {
            if (is_array($val)) {
                if (is_numeric($key)) {
                    $key = 'product';
                }
                $this->arr2xml($val, $xml->addChild($key));
            } else {
                $xml->addChild($key, $val);
            }
        }
        return $xml->asXML();
    }

    public function show()
    {
        if ($this->dataType == 'json') {
            $dataType = 'application/json';
        }

        if ($this->dataType == 'xml') {
            $dataType = 'text/xml';
        }

        header("Content-Type: $dataType; charset=utf-8'");
        echo $this->data;
    }
}