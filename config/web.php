<?php

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
            ]
        ],
        'modules' => [
            'debug' => 'yii\debug\Module',
        ],
    ];