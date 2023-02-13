<?php

namespace app\controllers;

use app\models\UserIdentity;
use app\models\UserRecord;
use Yii;
use yii\web\Controller;
use app\models\UserJoinForm;

class UserController extends Controller
{

    public function actionJoin():string{
      $userJoinForm = new UserJoinForm();

      return $this->render("join",compact('userJoinForm'));
    }

    public function actionLogin():string{
        $uid = UserIdentity::findIdentity(1);
        Yii::$app->user->login($uid);
        return $this->render("login");
    }

    public function actionLogout(): \yii\web\Response{
        Yii::$app->user->logout();
        return $this->redirect("/");
    }
}