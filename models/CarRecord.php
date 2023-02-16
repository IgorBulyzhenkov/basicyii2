<?php

namespace app\models;

use Cassandra\Date;
use yii\db\ActiveRecord;

class CarRecord extends ActiveRecord
{
    public static function tableName():string{
        return 'auto';
    }

    public function setAddCarUser($addCarForm){
        $this->type_car = $addCarForm->type_car;
        $this->car_brand = $addCarForm->car_brand;
        $this->year = $addCarForm->year;
        $this->car_model = $addCarForm->car_model;
        $this->run = $addCarForm->run;
        $this->region = $addCarForm->region;
        $this->city = $addCarForm->city;
        $this->img = $addCarForm->img;
        $this->price = $addCarForm->price;
        $this->name_img = $addCarForm->name_img;
        $this->user_id = '3';
        $this->user_name = 'Igor';
//        $this->date = new Date();
    }

    public function findAllCar(): array|bool
    {
        $query = new \yii\db\Query();

        return $query
            ->select('*')
            ->from('auto')
            ->all();
    }

}