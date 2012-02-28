<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components'=>array(
            'fixture'=>array(
                'class'=>'system.test.CDbFixtureManager',
            ),
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=sweet',
                'emulatePrepare' => true,
                'username' => 'sweet',
                'password' => 'zbMXLR8O6c07WMz9t1RA',
                'charset' => 'utf8',
            ),
        ),
    )
);
