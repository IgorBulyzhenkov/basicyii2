<?php

namespace app\controllers;

use yii\base\Controller;

class ThanksControllers extends Controller
{
    public function actionThanks():string{
        return $this->render('thanks');
    }
}