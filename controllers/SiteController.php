<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex():string{
       return $this->render("index");
    }

    public function actionJoin():string{
        return $this->render("join");
    }

    public function actionLogin():string{
        return $this->render("login");
    }
}