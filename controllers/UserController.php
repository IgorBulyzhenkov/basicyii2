<?php

namespace app\controllers;

use app\models\UserRecord;
use yii\web\Controller;

class UserController extends Controller
{

    public function actionJoin():string{
        $userRecord = new UserRecord();
        $userRecord->setStateUser();
        $userRecord->save();

        return $this->render("join");
    }

    public function actionLogin():string{
        return $this->render("login");
    }
}