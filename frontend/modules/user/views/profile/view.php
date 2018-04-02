<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
$this->title = 'Profile';
?>
<div class="site-index">

    <div class="jumbotron">
        <h3>Добро пожаловать <?php echo Html::encode($user->username);?></h3>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h4>Ваш логин: <?php echo Html::encode($user->username);?></h4>
                <h4>Ваш ник: <?php echo Html::encode($user->nickname);?></h4>
                <h4>Ваш email: <?php echo Html::encode($user->email);?></h4>
                <hr>
                <p>Немного о себе:</p>
                <p><?php echo HTMLPurifier::process($user->about);?></p>
            </div>
    </div>
</div>
