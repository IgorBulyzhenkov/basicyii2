<?php
use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

 /** @var app\models\UserJoinForm $userJoinForm */

?>

<div class="card bg-info">
    <div class="card-header">
        <h1>Join us</h1>
    </div>
    <div class="card-body form" style="text-align: left;">
        <?php $form = ActiveForm::begin(['id' => 'user-join-form']) ?>
        <?= $form->field($userJoinForm,'name') ?>
        <?= $form->field($userJoinForm,'email') ?>
        <?= $form->field($userJoinForm,'password')->passwordInput() ?>
        <?= $form->field($userJoinForm,'password2')->passwordInput() ?>
        <?= Html::submitButton('Submit', [
                'class' => 'btn btn-danger'
        ]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>