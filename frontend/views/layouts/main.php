<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\FontAwesomeAsset;
use common\widgets\Alert;

AppAsset::register($this);
FontAwesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="home">
<?php $this->beginBody() ?>
<!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top headroom animated slideDown">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                            class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="index.html"><img src="/image/logo.png" alt="imagepost"></a>
            </div>
            <div class="navbar-collapse collapse">
                <?php
                $menuItems = [
                    ['label' => 'На главную', 'url' => ['/site/index']],
                    ['label' => 'Люди', 'url' => ['/site/users-list']],
                ];
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Зарегистрироваться', 'url' => ['/user/default/signup']];
                    $menuItems[] = ['label' => 'Войти', 'url' => ['/user/default/login']];
                } else {
                    $menuItems[] = ['label' => 'Мой профиль', 'url' => ['/user/profile/view', 'nickname' => Yii::$app->user->identity->getNickname()]];
                    $menuItems[] = ['label' => 'Создать пост', 'url' => ['/post/default/create']];
                    $menuItems[] = '<li>'
                        . Html::beginForm(['/user/default/logout'], 'post')
                        . Html::submitButton(
                            'Выйти (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        .'<i class ="fas fa-sign-out-alt">sdfsdfsdfdfsd</i>'
                        . '</li>';
                }
                echo Nav::widget([
                    'options' => ['class' => 'nav navbar-nav pull-right'],
                    'items' => $menuItems,
                ]);
                ; ?>

            </div><!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->




<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= Alert::widget() ?>
<?= $content ?>


<footer id="footer" class="top-space">

    <div class="footer1">
        <div class="container">
            <div class="row">

                <div class="col-md-3 widget">
                    <h3 class="widget-title">Contact</h3>
                    <div class="widget-body">
                        <p>+234 23 9873237<br>
                            <a href="mailto:#">some.email@somewhere.com</a><br>
                            <br>
                            234 Hidden Pond Road, Ashland City, TN 37015
                        </p>
                    </div>
                </div>

                <div class="col-md-3 widget">
                    <h3 class="widget-title">Follow me</h3>
                    <div class="widget-body">
                        <p class="follow-me-icons">
                            <a href=""><i class="fa fa-twitter fa-2"></i></a>
                            <a href=""><i class="fa fa-dribbble fa-2"></i></a>
                            <a href=""><i class="fa fa-github fa-2"></i></a>
                            <a href=""><i class="fa fa-facebook fa-2"></i></a>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 widget">
                    <h3 class="widget-title">Text widget</h3>
                    <div class="widget-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
                        <p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
                    </div>
                </div>

            </div> <!-- /row of widgets -->
        </div>
    </div>

    <div class="footer2">
        <div class="container">
            <div class="row">

                <div class="col-md-6 widget">
                    <div class="widget-body">
                        <p class="simplenav">
                            <a href="#">Home</a> |
                            <a href="about.html">About</a> |
                            <a href="sidebar-right.html">Sidebar</a> |
                            <a href="contact.html">Contact</a> |
                            <b><a href="signup.html">Sign up</a></b>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 widget">
                    <div class="widget-body">
                        <p class="text-right">
                            &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
                        </p>
                    </div>
                </div>

            </div> <!-- /row of widgets -->
        </div>
    </div>

</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
