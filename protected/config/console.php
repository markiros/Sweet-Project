<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Sweet Project',

    // application components
    'components'=>array(
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=sweet',
            'emulatePrepare' => true,
            'username' => 'sweet',
            'password' => 'zbMXLR8O6c07WMz9t1RA',
            'charset' => 'utf8',
        ),
    ),
);