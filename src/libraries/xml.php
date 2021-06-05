<?php

namespace MGXML\Libraries;

use MGXML\config\config;

class xml extends config
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getArray()
    {
        try {

            $return = $this->setUrl()
                ->load()
                ->getXmlArray();

        } catch (Exception $e) {
                die($e->getMessage();
        }

        return $return;
    }

}