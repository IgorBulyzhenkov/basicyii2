<?php
    use yii\bootstrap5\NavBar;
    use yii\bootstrap5\Nav;

?>
<html lang="en">
    <head>
        <title>My TEST Yii2</title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <header style="position:fixed; width: 100%;">
            <?php
                NavBar::begin([
                            'brandLabel'=>"School",
                            'brandUrl'=>Yii::$app->homeUrl,
                            'options'=> [
                                    'class'=>'navbar-default navbar-fixed-top',
                                    "style"=> 'border-bottom: 1px solid; background-color: hsl(34deg 78% 91%);'
                            ]
                    ]);
                $menu = [
                        ["label"=>'Join',"url"=>['/user/join']],
                        ["label"=>"Login","url"=>['/user/login']]
                ];
                echo Nav::widget([
                        'options'=>['class'=>'navbar-nav'],
                        'items'=>$menu,
                ]);
                NavBar::end();
            ?>
        </header>
        <div class="container" style="text-align: center;padding-top: 70px;">
            <?= $content ?>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>