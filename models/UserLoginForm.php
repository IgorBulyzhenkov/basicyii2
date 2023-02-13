<?php

namespace app\models;

use yii\base\Model;

class UserLoginForm extends Model
{
    public string $email = '';
    public string $password = '';
}