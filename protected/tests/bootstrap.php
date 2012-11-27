<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../vendor/yiisoft/yii/framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';


require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

//CREATE YII WEBAPP INSTANCE
Yii::createWebApplication($config);

// REGISTER DICONTAINER
require_once(dirname(__FILE__).'/../config/DIConfiguration.php');