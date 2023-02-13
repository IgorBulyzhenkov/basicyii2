<?php

namespace app\controllers;

use app\models\UserIdentity;
use app\models\UserLoginForm;
use app\models\UserRecord;
use Yii;
use yii\web\Controller;
use app\models\UserJoinForm;

class UserController extends Controller
{

    public function actionJoin():string{
        if(Yii::$app->request->isPost){
            return $this->actionJoinPost();
        }

        $userJoinForm = new UserJoinForm();
        return $this->render("join",compact('userJoinForm'));
    }

    public function actionLogin():string{
        $userLoginForm = new UserLoginForm();
        return $this->render("login", compact('userLoginForm'));
    }

    public function actionJoinPost():string{
        $userJoinForm = new UserJoinForm();
        $userJoinForm->load(Yii::$app->request->post());
        if($userJoinForm->load(Yii::$app->request->post())){
            if($userJoinForm->validate()){
                $userJoinForm->name .= 'ok';
            }
        }

        return $this->render("join",compact('userJoinForm'));
    }

    public function actionLogout(): \yii\web\Response{
        Yii::$app->user->logout();
        return $this->redirect("/");
    }
}