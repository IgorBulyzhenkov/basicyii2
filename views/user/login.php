<?php

use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

/** @var app\models\UserLoginForm $userLoginForm */

$this->title = "Login";

?>

<?php if(Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dismissible container-btn" role="alert">
        <?= Yii::$app->session->getFlash('success') ?>
        <button type="button" class="close close-custom" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden=true >&times;</span>
        </button>
    </div>

<?php endif; ?>


<div class="card" style="background: #f0f2fa; width: 450px;text-align: left;">
    <div class="card-header">
        <h1>Login</h1>
    </div>
    <div class="card-body" style="min-height: 300px;">
        <?php $form = ActiveForm::begin(['id' => 'user-login-form']) ?>
        <?= $form->field($userLoginForm,'email')
            ->label("Email")
            ->textInput([ 'style' => 'margin-bottom:10px;margin-top: 10px']) ?>
        <?= $form->field($userLoginForm,'password')
            ->label("Пароль")
            ->passwordInput([ 'style' => 'margin-bottom:10px;margin-top: 10px']) ?>
        <?= $form->field($userLoginForm,'remember')
            ->label("Запам'ятати мене")
            ->checkbox() ?>
        <?= Html::submitButton('Увійти', [
            'class' => 'btn',
            'style' => 'margin-top:10px;background: #db5c4c;border:none;color:#fff'
        ]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>