
<?php if(Yii::$app->session->hasFlash('success')) : ?>
        <div class="alert alert-success alert-dismissible container-btn" role="alert">
            <?= Yii::$app->session->getFlash('success') ?>
            <button type="button" class="close close-custom" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden=true >&times;</span>
            </button>
        </div>

<?php endif; ?>

<ul class="list">
    <?php

    use yii\helpers\Html;

    /** @var app\models\UserLoginForm $cars*/


    $this->title=Yii::$app->user->getIdentity()->name;

        foreach ($cars as $car){

            $run  = '';

            if(strlen($car['run']) === 4) {
                $run =  mb_strimwidth($car['run'],0,1);
            }elseif (strlen($car['run']) === 5){
                $run =  mb_strimwidth($car['run'],0,2);
            }else{
                $run = mb_strimwidth($car['run'],0,3);
            }

            $deletePath = "/user/delete?id=$car[id]";


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
                        '.
                            Html::a('Видалити', ["$deletePath"], [
                                    'class' => 'btn btn-light',
                                    'style' => 'color: #black;margin-top:10px'
                                ])
                      .'</li>';
        }
    ?>
</ul>


