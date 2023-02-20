<?php

namespace app\controllers;

use app\models\CarRecord;
use yii\web\Controller;

class SiteController extends Controller {

    public function actionIndex():string{
        $allCar = new CarRecord();
       $cars = $allCar->findAllCar();
       return $this->render("index", compact('cars'));
    }

   public function actions():array
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