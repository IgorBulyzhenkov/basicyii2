<?php

    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');

    // підключення файлу класу Yii
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ .  '/../vendor/yiisoft/yii2/Yii.php';

    // завантаження конфігурації додатка
    $config = require __DIR__ . '/../config/web.php';

    // створення, конфігурація та виконання додатка
    (new yii\web\Application($config))->run();