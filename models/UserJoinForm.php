<?php

namespace app\models;

use yii\base\Model;

class UserJoinForm extends Model
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password2 = '';
}