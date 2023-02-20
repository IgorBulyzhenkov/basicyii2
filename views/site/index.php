<ul class="list">
    <?php
    /** @var app\models\UserLoginForm $cars*/

    $this->title='AUTO.RIA'.'™';

    $run = '';
        foreach ($cars as $car){

           if(strlen($car['run']) === 4) {
               $run =  mb_strimwidth($car['run'],0,1);
           }elseif (strlen($car['run']) === 5){
               $run  =  mb_strimwidth($car['run'],0,2);
           }else{
               $run  = mb_strimwidth($car['run'],0,3);
           }

            $img =  Yii::getAlias("@web")."/uploads/$car[img]";

            echo '<li class = "item">
                    <img src='.$img.' alt="carBrand" class = "img" />
                    <div class = "containerText">
                      <p class = "text">' .
                        $car["car_brand"].' '. $car["car_model"].' '.$car["year"]
                    .'</p>
                      <p class = "price" >'
                . $car["price"] .' $<span class = "run" >'.$run.' тис. км </span>
                      </p>
                    </div>
                  </li>';
        }
    ?>
</ul>
