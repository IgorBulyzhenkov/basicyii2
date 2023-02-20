<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UserAddCarForm extends Model
{

    /**
     * @var UploadedFile
     */

    public string $type_car = '';
    public string $car_brand = '';
    public string $year = '';
    public string $car_model = '';
    public string $run = '';
    public string $region = '';
    public string $city = '';
    public $file;
    public string $price = '';
    public string $name_img = '';
    public string $user_id = '';
    public string $user_name = '';
    public int $date;


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
            ['file', 'image',
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'checkExtensionByMimeType' => true,
                'maxSize' => 5120000, // 5000 килобайт = 5000 * 1024 байта = 5120000 байт
                'tooBig' => 'Limit is 5000KB'
            ],
            ['price', 'required','message'=>'Треба заповнити поле'],
            [['car_brand','car_model','run','price','city'],'trim']
        ];
    }

    public function upload()
    {
            $dir = "@app/web/uploads/"; // Директория - должна быть создана
            $name = $this->randomFileName($this->file->extension);
            $file = $name;
            $this->file->saveAs($dir . $file); // Сохраняем файл
            return $file;
    }

    private function randomFileName($extension = false)
    {
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = md5(microtime() . rand(0, 1000));
            $file = $name . $extension;
        } while (file_exists($file));
        return $file;
    }

}