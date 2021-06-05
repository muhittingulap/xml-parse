<?php

namespace MGXML\Config;

class config {
    
    private $url="XML_URL";

    public function __construct()
    {

    }
   
    protected function setUrl($data="")
    {
        $this->url=(string)$data;
        return $this;
    }
  
    protected function call(){
        
        return $return;
    }

}