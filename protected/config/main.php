<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'COS net',
    'theme'=>'cosantiago',
    'sourceLanguage' => 'es',
    'language' => 'es',
    'timeZone' => 'America/Buenos_Aires',
    /*'defaultController'=>'post',*/

	// preloading 'log' component
	'preload'=>array('log', 'bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.classes.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'polito12',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),

            'generatorPaths'=>array(
               'bootstrap.gii', // since 0.9.1
             ), 
		),
		
/*		
	   'user'=>array(
            'preload'=>array('bootstrap'),
            'components'=>array(
                'bootstrap'=>array(
                    'class'=>'ext.bootstrap.components.Bootstrap'
                 )
             ),
		),
*/	
	),

	// application components
	'components'=>array(
	    'request'=>array(
            'enableCsrfValidation'=>false,
            'enableCookieValidation'=>true,
        ),
	
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'class' => 'WebUser',			
		),
		
        'bootstrap'=>array(
            'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        ),
		
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
	//	'db'=>array(
	//		'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	//	),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=cosnet',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
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

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'matdir'=>'d:\kk\matprod.html', /* \\servidor\materiales\mat\web\matprod.html */
		'urlcgi'=>'http://www.cosantiago.com.ar', /*Yii::app()->request->baseUrl*/
		'userMat'=>'pdmateriales@gmail.com',
		'passwMat'=>'envios21',
		'emailMat'=>'josedam@yahoo.com',
	),
	
    'homeUrl'=>array('home/index'),
    'defaultController'=>'home',
	
);
