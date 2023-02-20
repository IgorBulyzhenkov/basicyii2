<?php

namespace app\controllers;

use app\models\CarRecord;
use app\models\UserAddCarForm;
use app\models\UserLoginForm;
use app\models\UserRecord;
use Yii;
use yii\web\Controller;
use app\models\UserSingUpForm;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class UserController extends Controller
{
    public function actionSingup(): \yii\web\Response|string
    {
        if(!Yii::$app->user->isGuest){
            return $this->redirect('/');
        }
        if(Yii::$app->request->isPost){
            return $this->actionSingUpPost();
        }
        $userSingUpForm = new UserSingUpForm();
        return $this->render("singup",compact('userSingUpForm'));
    }

    public function actionLogin(): \yii\web\Response|string
    {

        if(!Yii::$app->user->isGuest){
            return $this->redirect('/');
        }
        if(Yii::$app->request->isPost)
            return $this->actionLoginPost();

        $userLoginForm = new UserLoginForm();
        return $this->render("login", compact('userLoginForm'));
    }


    public function actionSingUpPost(): \yii\web\Response|string
    {
        $userSingUpForm = new UserSingUpForm();
        if($userSingUpForm->load(Yii::$app->request->post())){
            if($userSingUpForm->validate()){
                $userRecord = new UserRecord();
                $userRecord->setUserSingUpForm($userSingUpForm);
                $userRecord->save();
                return $this->redirect('/user/login');
            }
        }

        return $this->render("singup",compact('userSingUpForm'));
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

    public function actionAddCar(): \yii\web\Response|string
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/');
        }
        $this->actionCarAddPost();
        $userAddCarForm = new UserAddCarForm();
        return $this->render('addCar',compact('userAddCarForm'));
    }

    public function actionCarAddPost(): \yii\web\Response|string
    {
        $userCarRecord = new CarRecord();
        if( count($userCarRecord->findCarUserId(Yii::$app->user->getIdentity()->id)) === 3 ){
            return $this->redirect('/user/helper');
        }

        $userAddCarForm = new UserAddCarForm();
        if($userAddCarForm->load(Yii::$app->request->post())){
            if($userAddCarForm->validate()){
                $fileName = $this->actionFileName();
                $file = $_FILES;
                $userCarRecord->setAddCarUser($userAddCarForm, $file,$fileName);
                $userCarRecord->save();
                return $this->redirect('/user');
            }
        }
        return $this->render('addCar',[
            'userAddCarForm' => $userAddCarForm
         ]);
    }


    public  function actionIndex(): \yii\web\Response|string
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/');
        }
        $user = new CarRecord();
        $cars = $user->findCarUserId(Yii::$app->user->getIdentity()->id);
        return $this->render('index',compact('cars'));
    }

    public function actionHelper(): \yii\web\Response|string
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/');
        }
        return $this->render('helper');
    }

    /**
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDelete($id = null)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/');
        }
        $model = new CarRecord();
        $oneCar = $model->findOneCar($id);

        if($oneCar === false) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
            $model->delete();

        return $this->redirect('/user/');
    }

    public function actionFileName()
    {
        $model = new UserAddCarForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $fileName = $model->upload();
            if ($fileName) {
                Yii::$app->session->setFlash('success', 'Изображение загружено');
            }
            return $fileName;
        }

    }

}