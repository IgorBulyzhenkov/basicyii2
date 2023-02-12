<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

    return [
        'id'=>'school',
        'basePath'=> realpath(__DIR__ . '/../'),
        'bootstrap' => [
            'debug'
        ],
        'components' => [
            'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'rules' => [
                ],
            ],
            'request' => [
                'cookieValidationKey' => 'my secret key'
            ],
            'db' => $db,
        ],
        'params' => $params,
        'modules' => [
            'debug' => 'yii\debug\Module',
        ],
    ];