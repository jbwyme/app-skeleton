<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."AppConfig.php");

/**
 * @property \config\AppConfig
 * We create this here so we can do it only once for the app (as we need some settings to setup Yii).
 * The DI Container will inject it into dependencies going forward
 */
$appConfig = \config\AppConfig::getInstance(dirname(__FILE__).DIRECTORY_SEPARATOR."properties.ini", DIRECTORY_SEPARATOR."properties.ini");

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
        // vendor is the only folder in which we don't have control over namespacing
        // for our custom classes we should namespace them properly and take advantage
        // of default autoloading
        'application.vendor.*',

        // temp bug fix until yii fixes form field naming issue. see: https://github.com/yiisoft/yii/issues/129
        'application.models.*',

	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yiigii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<pass:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

            ),
		),

//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => $appConfig->dbConnectionString,
            'emulatePrepare' => true,
            'username' => $appConfig->dbUsername,
            'password' => $appConfig->dbPassword,
            'charset' => 'utf8',
        ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

    'sourceLanguage'=>'00',
    'language'=>'en',
);