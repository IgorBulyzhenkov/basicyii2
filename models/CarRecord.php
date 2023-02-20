<?php

namespace app\models;

use yii;
use yii\db\ActiveRecord;

class CarRecord extends ActiveRecord
{

    private array $typeCar = ['Легкові','Мото','Вантажівки','Причепи',
        'Спецтехніка','Сільгосптехніка','Автобуси','Водний транспорт',
        'Повітряний транспорт','Автобудинки'];

    private array $regionArr = ['Київ','Чернігів','Чернівці','Вінниця','Миколаїв',
        'Одеса','Запоріжжя','Івано-Франківськ','Кропивницький (Кіровоград)',
        'Луганська обл.', 'Луцьк','Львів','Рівне','Суми','Тернопіль','Ужгород',
        'Харків','Херсон','Хмельницький','Черкаси','Житомир',
        'Донецька обл.','Дніпро (Дніпропетровськ)'];

    private string $id = '';

    public static function tableName():string{
        return 'auto';
    }

    public function findTypeCar($numberTypeIndex)
    {
        for($i = 0; $i <= count($this->typeCar) ; $i++){
            if($i === $numberTypeIndex){
                return $this->typeCar[$i];
            }
        };
    }

    public function findRegion($reg)
    {
        for($i = 0; $i <= count($this->regionArr) ; $i++){
            if($i === $reg){
                return $this->regionArr[$i];
            }
        };
    }

    public function setAddCarUser($addCarForm,$file,$fileName){
        $this->type_car = $this->findTypeCar((int)$addCarForm['type_car']);
        $this->car_brand = $addCarForm->car_brand;
        $this->year = $addCarForm->year;
        $this->car_model = $addCarForm->car_model;
        $this->run = $addCarForm->run;
        $this->region = $this->findRegion((int)$addCarForm['region']);
        $this->city = $addCarForm->city;
        $this->img = $fileName;
        $this->price = $addCarForm->price;
        $this->name_img = $file['UserAddCarForm']['name']['file'];
        $this->user_id = Yii::$app->user->getIdentity()->id;
        $this->user_name = Yii::$app->user->getIdentity()->name;
        $this->date = date('D d M Y H:i:s');
    }

    public function findAllCar(): array|bool
    {
        $query = new \yii\db\Query();

        return $query
            ->select('*')
            ->from('auto')
            ->all();
    }

    public function findCarUserId($userId): array
    {
        $query = new \yii\db\Query();

        return $query
            ->select('*')
            ->from('auto')
            ->where(['user_id' => $userId])
            ->all();
    }

    public function findOneCar($id)
    {
        $query = new \yii\db\Query();

        $car = $query
            ->select('*')
            ->from('auto')
            ->where(['id' => $id])
            ->one();

        $this->id = $car['id'];
        return $car;
    }

    public function delete()
    {
        $query = new \yii\db\Query();

        $car = $query
            ->createCommand()
            ->delete('auto', ['id' => $this->id])
            ->execute();

    }

}