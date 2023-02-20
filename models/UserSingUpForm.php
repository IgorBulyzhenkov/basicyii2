<?php

namespace app\models;

use yii\base\Model;

class UserSingUpForm extends Model
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password2 = '';


    public function rules():array
    {
        return [
            ['name', 'required','message'=>'Треба заповнити поле'],
            ['email', 'required','message'=>'Треба заповнити поле'],
            ['password', 'required','message'=>'Треба заповнити поле'],
            ['password2', 'required','message'=>'Треба заповнити поле'],
            ['name','string','min'=>3,'max'=>30,'message'=>"Ім'я повинно бути від 3 до 30 символів"],
            ['email', 'email','message'=>'Почта вказана невірно'],
            ['password','string', 'min'=>8,'message'=>'Пароль повинен мати мінімум 8 символів' ],
            ['password2', 'compare', 'compareAttribute'=>'password', 'message'=>'Паролі повинні співпадати'],
            ['email', 'errorIfEmailUse']
        ];
    }

    public function errorIfEmailUse(){

        $userEmail = UserRecord::findEmail($this->email);
        if($userEmail)
            $this->addError('email','Такий емейл вже використовуеться ');
    }

}