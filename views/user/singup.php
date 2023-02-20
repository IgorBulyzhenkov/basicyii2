<?php

use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

 /** @var app\models\UserSingUpForm $userSingUpForm */

$this->title = "Sing Up";

?>

<div class="card" style="background: #f0f2fa; width: 450px;text-align: left;">
    <div class="card-header">
        <h1>Sing Up</h1>
    </div>
    <div class="card-body form" style="min-height: 300px;">
        <?php $form = ActiveForm::begin(['id' => 'user-join-form']) ?>
        <?= $form->field($userSingUpForm,'name')
            ->label("Ім'я")
            ->textInput([ 'style' => 'margin-bottom:10px;margin-top: 10px'])?>
        <?= $form->field($userSingUpForm,'email')
            ->label("Email")
            ->textInput([ 'style' => 'margin-bottom:10px;margin-top: 10px'])?>
        <?= $form->field($userSingUpForm,'password')
            ->label("Пароль")
            ->passwordInput([ 'style' => 'margin-bottom:10px;margin-top: 10px']) ?>
        <?= $form->field($userSingUpForm,'password2')
            ->label("Повторить пароль")
            ->passwordInput([ 'style' => 'margin-bottom:10px;margin-top: 10px']) ?>
        <?= Html::submitButton('Зареєструватися', [
                'class' => 'btn',
                'style' => 'margin-top:10px;background: #db5c4c;border:none;color:#fff'
        ]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>