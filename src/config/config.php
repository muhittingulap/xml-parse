<?php

namespace MGXML\Config;

class config
{

    private $url = "XML_URL";

    public function __construct()
    {

    }

    public function setUrl($data = "")
    {
        $this->url = (string) $data;
        return $this;
    }

    protected function getXmlString()
    {
        return (string) $this->xml;
    }

    protected function getXmlArray()
    {
        $this->jsonArray = json_decode(json_encode($this->xml), true);
        return $this->jsonArray;
    }
    protected function load()
    {
        $this->xml = file_get_contents($this->url, false);
        $this->xml = simplexml_load_string($this->xml);

        return $this;
    }

}
