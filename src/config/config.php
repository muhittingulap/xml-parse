<?php
namespace MGXML\Config;

class config
{

    private $url = "XML_URL";
    private $parentAttr = "XML_PARENT_ATTR";

    public function __construct()
    {

    }

    public function slugify($str)
    {
        $str = str_replace(
            ['ı', 'ğ', 'ö', 'ç', 'ş', 'ü', 'İ', 'Ğ', 'Ü', 'Ş', 'Ç', 'Ö'],
            ['i', 'g', 'o', 'c', 's', 'u', 'I', 'G', 'U', 'S', 'C', 'O'],
            $str);
        $str = mb_strtolower($str);
        $str = preg_replace('/[^a-z0-9]/', '-', $str);
        $str = preg_replace('/-+/', '-', $str);
        return trim($str, '-');
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

    protected function getXmlDataArray($special = array())
    {
        if (count($special) > 0) {
            $this->setXmlDataArray($special);
        }

        return $this->jsonArray[$this->parentAttr];
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
                if (@count($value) > 0) {
                    foreach ($value as $k => $v) {
                        $this->keysArray[$k] = $k;
                    }
                }
            }
        }
        return $this;
    }

    private function setXmlDataArray($special = array())
    {
        if (@count($special) > 0) {
            if (@count($this->jsonArray[$this->parentAttr] > 0)) {
                foreach ($this->jsonArray[$this->parentAttr] as $key => $value) {
                    if (@count($value) > 0) {
                        foreach ($value as $k => $v) {
                            if (array_search($k, $special) === false) {
                                unset($this->jsonArray[$this->parentAttr][$key][$k]);
                            }
                        }
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