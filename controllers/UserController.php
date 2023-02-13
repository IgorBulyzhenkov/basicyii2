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

    public function actionJoin(): \yii\web\Response|string
    {
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

    public function actionJoinPost(): \yii\web\Response|string
    {
        $userJoinForm = new UserJoinForm();
        $userJoinForm->load(Yii::$app->request->post());
        if($userJoinForm->load(Yii::$app->request->post())){
            if($userJoinForm->validate()){
                $userRecord = new UserRecord();
                $userRecord->setUserJoinForm($userJoinForm);
                $userRecord->save();
                return $this->redirect("/user/thanks");
            }
        }

        return $this->render("join",compact('userJoinForm'));
    }

    public function actionLogout(): \yii\web\Response{
        Yii::$app->user->logout();
        return $this->redirect("/");
    }

    public function actionThanks():string{
        return $this->render('thanks');
    }
}