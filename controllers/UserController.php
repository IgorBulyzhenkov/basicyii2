<?php

namespace app\controllers;

use app\models\CarRecord;
use app\models\UserAddCarForm;
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

    public function actionLogin(): \yii\web\Response|string
    {

        if(Yii::$app->request->isPost)
            return $this->actionLoginPost();

        $userLoginForm = new UserLoginForm();
        return $this->render("login", compact('userLoginForm'));
    }


    public function actionJoinPost(): \yii\web\Response|string
    {
        $userJoinForm = new UserJoinForm();
        if($userJoinForm->load(Yii::$app->request->post())){
            if($userJoinForm->validate()){
                $userRecord = new UserRecord();
                $userRecord->setUserJoinForm($userJoinForm);
                $userRecord->save();
                return $this->redirect('/user/thanks');
            }
        }

        return $this->render("join",compact('userJoinForm'));
    }

    public function actionLoginPost(): \yii\web\Response|string
    {
        $userLoginForm = new UserLoginForm();
        if($userLoginForm->load(Yii::$app->request->post()))
            if($userLoginForm->validate()) {
                $userLoginForm->login();
                return $this->redirect('/');
            }

        return $this->render('login', compact('userLoginForm'));
    }

    public function actionLogout(): \yii\web\Response{
        Yii::$app->user->logout();
        return $this->redirect("/");
    }

    public function actionThanks():string{
        return $this->render('thanks');
    }

    public function actionAddCar(): string
    {
        $userAddCarForm = new UserAddCarForm();
        if($userAddCarForm->load(Yii::$app->request->post())){
            if($userAddCarForm->validate()){
                $userCarRecord = new CarRecord();
                $userCarRecord->setAddCarUser($userAddCarForm);
                $userCarRecord->save();
            }
        }
        return $this->render('add-car',compact('userAddCarForm'));
    }

    public  function actionIndex():string{
        return $this->render('index');
    }
}