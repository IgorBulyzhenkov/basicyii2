<?php
    use yii\bootstrap5\NavBar;
    use yii\bootstrap5\Nav;
    use yii\helpers\Html;

/** @var string $content */

use app\assets\AppAsset;

AppAsset::register($this);

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html  lang="ru" class="h-100">
    <head>
        <meta charset="UTF-8" />
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
        <?php $this->beginBody() ?>
        <header>
            <?php
                NavBar::begin([
                            'brandLabel'=>'<img src="https://auto.ria.com/images/autoria-seo.png" style="height: 40px"/>',
                            'brandUrl'=>Yii::$app->homeUrl,
                    'options' => [
                            'class' => 'navbar-expand-md fixed-top',
                            "style"=> 'background: #f0f2fa'
                    ]
                    ]);
                Yii::$app->user->isGuest ?
                    $menu = [
                            ["label"=>'Зареєструватися',"url"=>['/user/singup']],
                            ["label"=>"Увійти","url"=>['/user/login']]
                    ] :
                    $menu = [
                        ["label" => Yii::$app->user->getIdentity()->name, 'url' => ['/user']],
                        ["label" => "Вийти","url"=>['/user/logout']],
                        ['label' => 'Додати оголошення', 'url' => ['/user/add-car']]
                    ];
                echo Nav::widget([
                        'options'=>[
                                'class'=>'navbar-nav',
                                'style' => 'margin-left:auto'
                            ],
                        'items'=>$menu,
                ]);
                NavBar::end();
            ?>
        </header>

        <main id="main" class="flex-shrink-0" role="main">
            <div class="container" style="text-align: center;padding-top: 90px;padding-bottom: 100px;">
                <?= $content ?>
            </div>
        </main>

        <footer id="footer" class="mt-auto py-3 bg-light">
            <div class="container">
                <div class="row text-muted">
                    <div class="col-md-6 text-center text-md-start">&copy; AUTO.RIO™ <?= date('Y') ?></div>
                    <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
                </div>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>