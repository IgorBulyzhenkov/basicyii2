<?php

namespace app\models;

use yii\base\Model;

class UserAddCarForm extends Model
{

    public string $type_car = '';
    public string $car_brand = '';
    public string $year = '';
    public string $car_model = '';
    public string $run = '';
    public string $region = '';
    public string $city = '';
    public string $img = '';
    public string $price = '';
    public string $name_img = '';
    public string $user_id = '';
    public string $user_name = '';
    public int $date;

    public static function tableName():string{
        return 'auto';
    }

    public function rules():array
    {
        return [
            ['type_car', 'required','message'=>'Треба заповнити поле'],
            ['car_brand', 'required','message'=>'Треба заповнити поле'],
            ['year', 'required','message'=>'Треба заповнити поле'],
            ['car_model', 'required','message'=>'Треба заповнити поле'],
            ['run', 'required','message'=>'Треба заповнити поле'],
            ['region', 'required','message'=>'Треба заповнити поле'],
            ['city', 'required','message'=>'Треба заповнити поле'],
            ['img', 'required','message'=>'Треба заповнити поле'],
            ['price', 'required','message'=>'Треба заповнити поле'],
            ['name_img', 'required','message'=>'Треба заповнити поле'],
        ];
    }

}