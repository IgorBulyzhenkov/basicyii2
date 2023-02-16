<?php

use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

/** @var app\models\UserLoginForm $userLoginForm */

?>


<div class="card" style="background-color: hsl(0deg 2% 63%);">
    <div class="card-header">
        <h1>Login us</h1>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin(['id' => 'user-login-form']) ?>
        <?= $form->field($userLoginForm,'email') ?>
        <?= $form->field($userLoginForm,'password')->passwordInput() ?>
        <?= Html::submitButton('Submit', [
            'class' => 'btn btn-info'
        ]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>