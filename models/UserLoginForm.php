<?php

namespace app\models;

use yii;
use yii\base\Model;

class UserLoginForm extends Model
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function rules():array
    {
        return [
            ['email', 'required','message'=>'Треба заповнити поле'],
            ['password', 'required','message'=>'Треба заповнити поле'],
            ['remember', 'boolean'],
            ['email', 'email','message'=>'Почта вказана невірно'],
            ['password','string', 'min'=>8,'message'=>'Пароль повинен мати мінімум 8 символів' ],
            ['email', 'errorIfEmailNotFound'],
            ['password', 'errorIfPasswordWrong']
        ];
    }

    public function errorIfPasswordWrong(){
        if($this->hasErrors())
            return;
        $userLogin = UserRecord::findPasswordAndEmail($this->email);

        if(!UserRecord::validatePassword($this->password,$userLogin['password'])){
            $this->addError('password', 'Невірний пароль');
        }

    }

    public function errorIfEmailNotFound(){
        if($this->hasErrors())
            return;
        $userLogin = UserRecord::findEmail($this->email);
        if(!$userLogin) {
            $this->addError('email', 'Такого користувача не існує');
        }
    }

    public function login()
    {
        if($this->hasErrors())
            return;
        $userRecord = UserRecord::findUser($this->email);
        $userIdentity = UserIdentity::findIdentity($userRecord['id']);
        Yii::$app->user->login($userIdentity, $this->remember ? 300*24*30 : 0);
    }
}