<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Russell Hobbs Moneyback',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
        'admin' => array(),
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'aF*_)A*0',
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
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=moneyback',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'qwerty',
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
        'clientScript'=>array(
            'packages'=>array(
                'fancybox' => array(
                    'baseUrl'=>'/',
                    'js' => array(
                        'js/jquery.fancybox.pack.js?v=2.0.6'
                    ),
                    'css' => array(
                        'css/jquery.fancybox.css?v=2.0.6'
                    ),
                    'depends' => array('jquery')
                ),
                'scrollpane' => array(
                    'baseUrl'=>'/',
                    'js' => array(
                        'js/jScrollPane.js'
                    ),
                    'css' => array(
                        'css/jscrollpane.css'
                    ),
                    'depends' => array('jquery')
                ),
                'carousel' => array(
                    'baseUrl'=>'/',
                    'js' => array(
                        'js/jquery.carouFredSel-6.1.0-packed.js'
                    ),
                    'depends' => array('jquery')
                ),
                'filestyle' => array(
                    'baseUrl'=>'/',
                    'js' => array(
                        'js/jquery.filestyle.mini.js'
                    ),
                    'depends' => array('jquery')
                ),
                'mask' => array(
                    'baseUrl'=>'/',
                    'js' => array(
                        'js/mask.js'
                    ),
                    'depends' => array('jquery')
                ),
                'index' => array(
                    'baseUrl'=>'/',
                    'js' => array(
                        'js/index.js'
                    ),
                    'css' => array(
                        'css/index.css'
                    ),
                    'depends' => array('jquery')
                ),
                'inner' => array(
                    'baseUrl'=>'/',
                    'js' => array(
                        'js/script.js'
                    ),
                    'css' => array(
                        'css/inner.css'
                    ),
                    'depends' => array('jquery')
                ),
            ),
        ),
	),
    'sourceLanguage'    =>'ru',
    'language'          =>'ru',
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'denis@e-produce.ru',
        'moderatorEmail'=>'denis@e-produce.ru',
        'salt' => 'dhf9dsa79A9a0&*'
	),
);