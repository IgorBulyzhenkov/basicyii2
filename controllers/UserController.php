<?php

namespace app\controllers;

use yii\web\Controller;

class UserController extends Controller
{

    public function actionJoin():string{
        return $this->render("join");
    }

    public function actionLogin():string{
        return $this->render("login");
    }
}