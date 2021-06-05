<?php

namespace MGXML\Config;

class config
{

    private $url = "XML_URL";
    private $parentAttr = "XML_PARENT_ATTR";

    public function __construct()
    {

    }

    public function setParentAttr($data = "")
    {
        $this->parentAttr = (string) $data;
        return $this;
    }

    public function setUrl($data = "")
    {
        $this->url = (string) $data;
        return $this;
    }

    protected function setXmlToArray()
    {
        $this->jsonArray = json_decode(json_encode($this->xml), true);
        return $this;
    }

    protected function getXmlString()
    {
        return (string) $this->xml;
    }

    protected function getXmlDataArray()
    {
        return $this->jsonArray;
    }

    protected function getXmlKeysArray()
    {
        return $this->keysArray;
    }

    protected function setXmlKeysArray()
    {
        $this->keysArray = array();
        if (@count($this->jsonArray[$this->parentAttr] > 0)) {
            foreach ($this->jsonArray[$this->parentAttr] as $key => $value) {
                if (@count($this->jsonArray[$this->parentAttr] > 0)) {
                    foreach ($value as $k => $v) {
                        $this->keysArray[$k] = $k;
                    }
                }
            }
        }
        return $this;
    }

    protected function load()
    {
        ini_set('memory_limit', '256M');

        $this->xml = file_get_contents($this->url, false);
        $this->xml = simplexml_load_string($this->xml);

        return $this;
    }

}
