<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/protected/vendor/yiisoft/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
$app = Yii::createWebApplication($config);

// REGISTER LOG4PHP
spl_autoload_unregister(array('YiiBase','autoload'));
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'log4php'.DIRECTORY_SEPARATOR.'Logger.php'); // require registers Logger autoload
Logger::configure(dirname(__FILE__).DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'log.xml');
spl_autoload_register(array('YiiBase','autoload'));

// REGISTER DICONTAINER
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'DIConfiguration.php');

$app->run();
