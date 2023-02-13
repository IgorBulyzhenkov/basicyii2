<?php

namespace app\controllers;

use JetBrains\PhpStorm\ArrayShape;
use yii\web\Controller;

class SiteController extends Controller {

    public function actionIndex():string{
       return $this->render("index");
    }

    #[ArrayShape(['error' => "string[]", 'captcha' => "array"])] public function actions():array
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
}