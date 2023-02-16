<?php

namespace app\models;

use Yii;
use PhpParser\Node\Stmt\Switch_;
use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{

    private int $salt = 10;
    /**
     * @var mixed|null
     */
    private mixed $id;

    public static function tableName():string{
        return 'user';
    }

    public static function findEmail($email): bool
    {
        $count = static::find()->where(['email'=>$email])->count();

        return $count > 0;
    }

    public static function findPasswordAndEmail($email): bool|array
    {
        $query = new \yii\db\Query();

        return $query
            ->select('*')
            ->from('user')
            ->where(['email'=>$email])
            ->one();
    }

    public static function findUser($email): bool|array
    {
        $query = new \yii\db\Query();
        return $query
            ->select(['id', 'email','name'])
            ->from('user')
            ->where(['email'=>$email])
            ->one();
    }

    public function setUserJoinForm($userJoinForm)
    {
        $this->name = $userJoinForm->name;
        $this->email = $userJoinForm->email;
        $this->password = $this->setPasswordHash($userJoinForm->password);
        $this->status = 1;
    }

    public function setPasswordHash($password):string
    {
        return Yii::$app->getSecurity()->generatePasswordHash($password,$this->salt);
    }

    public static function validatePassword($password,$userPass):bool{
        return Yii::$app->security->validatePassword($password,$userPass);
    }

}