<?php

namespace app\controllers;

use app\models\UserRecord;
use yii\web\Controller;
use app\models\UserJoinForm;

class UserController extends Controller
{

    public function actionJoin():string{
      $userJoinForm = new UserJoinForm();

      return $this->render("join",compact('userJoinForm'));
    }

    public function actionLogin():string{
        return $this->render("login");
    }
}