<?php

use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

/** @var app\models\UserLoginForm $userAddCarForm */

?>

<div class="card" style="background-color: hsl(0deg 2% 63%);">
    <div class="card-header">
        <h1>Add car</h1>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin(['id' => 'user-add-car-form']) ?>
        <?= $form->field($userAddCarForm,'type_car') ?>
        <?= $form->field($userAddCarForm,'car_brand') ?>
        <?= $form->field($userAddCarForm,'year') ?>
        <?= $form->field($userAddCarForm,'car_model') ?>
        <?= $form->field($userAddCarForm,'run') ?>
        <?= $form->field($userAddCarForm,'region') ?>
        <?= $form->field($userAddCarForm,'city') ?>
        <?= $form->field($userAddCarForm,'img') ?>
        <?= $form->field($userAddCarForm,'price') ?>
        <?= $form->field($userAddCarForm,'name_img') ?>
        <?= Html::submitButton('Submit', [
            'class' => 'btn btn-info'
        ]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>