<?php

namespace MGXML\Libraries;

use MGXML\config\config;

class xml extends config
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getKeys()
    {
        try {

            $return = $this->load()
                           ->setXmlToArray()
                           ->setXmlKeysArray()
                           ->getXmlKeysArray();

        } catch (Exception $e) {
                die($e->getMessage());
        }

        return $return;
    }

    public function getData($special=array())
    {
        try {

            $return = $this->load()
                           ->setXmlToArray()
                           ->getXmlDataArray($special);

        } catch (Exception $e) {
                die($e->getMessage());
        }

        return $return;
    }

}