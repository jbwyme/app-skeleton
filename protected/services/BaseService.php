<?php
namespace application\services;

abstract class BaseService {

    function __construct()
    {
        global $DIContainer;
        $DIContainer->inject($this);
    }


    function __toString()
    {
        return __CLASS__;
    }

}