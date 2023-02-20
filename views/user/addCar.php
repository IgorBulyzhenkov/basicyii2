<?php

use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

/** @var app\models\UserAddCarForm $userAddCarForm */

$arr = range(date('Y') - 100, date('Y'));
$newArr = [];

foreach ($arr as $ar){
    $newArr[$ar] = $ar;
}

$this->title = "Додати авто";

    $region = ['Київ','Чернігів','Чернівці','Вінниця','Миколаїв',
        'Одеса','Запоріжжя','Івано-Франківськ','Кропивницький (Кіровоград)',
        'Луганська обл.', 'Луцьк','Львів','Рівне','Суми','Тернопіль','Ужгород',
        'Харків','Херсон','Хмельницький','Черкаси','Житомир',
        'Донецька обл.','Дніпро (Дніпропетровськ)'];

    $typeCar = ['Легкові','Мото','Вантажівки','Причепи',
        'Спецтехніка','Сільгосптехніка','Автобуси','Водний транспорт',
        'Повітряний транспорт','Автобудинки'];
?>

<div class="card" style="background: #f0f2fa; max-width: 750px;text-align: left;">
    <div class="card-header">
        <h1>Форма оголошення</h1>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin([
                'id' => 'user-add-car-form',
            ]) ?>

        <?= $form->field($userAddCarForm,'file')
            ->label(false)
            ->fileInput(
                [ 'style' => 'margin-bottom:10px;margin-top: 10px']
            ) ?>
        <?= $form->field($userAddCarForm,'type_car')
            ->label("Тип транспорту")
            ->dropDownList($typeCar,[ 'style' => 'margin-bottom:10px;margin-top: 10px'])?>
        <?= $form->field($userAddCarForm,'car_brand')
            ->label("Марка")
            ->textInput([ 'style' => 'margin-bottom:10px;margin-top: 10px'])?>
        <?= $form->field($userAddCarForm, 'year')
            ->label("Рік випуску")
            ->dropDownList($newArr,[
                    'class' => 'form-control-year',
                    'style' => 'margin-bottom:10px;margin-top: 10px'
            ]); ?>
        <?= $form->field($userAddCarForm,'car_model')
            ->label("Модель")
            ->textInput(['style' => 'margin-bottom:10px;margin-top: 10px'])?>
        <?= $form->field($userAddCarForm,'run')
            ->label("Пробіг")
            ->textInput([
                'type' => 'number',
                'style' => 'margin-bottom:10px;margin-top: 10px'
            ])?>
        <?=
            $form->field($userAddCarForm,'region')
                ->label("Регіон")
                ->dropDownList($region,[
                    'style' => 'margin-bottom:10px;margin-top: 10px;'
            ])
        ?>
        <?= $form->field($userAddCarForm,'city')
            ->label("Місто")
            ->textInput([ 'style' => 'margin-bottom:10px;margin-top: 10px'])?>
        <?= $form->field($userAddCarForm,'price')
            ->label("Ціна")
            ->textInput([
                    'type' => 'number',
                    'style' => 'margin-bottom:10px;margin-top: 10px'
            ])?>
        <?= Html::submitButton('Додати', [
            'class' => 'btn',
            'style' => 'margin-top:10px;background: #db5c4c;border:none;color:#fff'
        ]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>