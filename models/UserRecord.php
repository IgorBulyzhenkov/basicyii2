<?php

namespace app\models;

use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
//    public $name;
//    public $email;
//    public $password;
//    public $status;

    public static function tableName():string{
        return 'user';
    }

    public function setStateUser() {
        $this->name = "Igor";
        $this->email = "test@gmail.com";
        $this->password = '12345678';
        $this->status = 2;
    }

    public static function findUserByEmail($email) :bool{
        $count = static::find()->where(['email'=>$email])->count();

        return $count > 0;
    }

}