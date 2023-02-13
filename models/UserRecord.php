<?php

namespace app\models;

use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{

    public static function tableName():string{
        return 'user';
    }

    public static function findUserByEmail($email) :bool{
        $count = static::find()->where(['email'=>$email])->count();

        return $count > 0;
    }

    public function setUserJoinForm($userJoinForm)
    {
        $this->name = $userJoinForm->name;
        $this->email = $userJoinForm->email;
        $this->password = $userJoinForm->password;
        $this->status = 1;
    }

}