<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
$this->title = 'Profile';
?>
<div class="site-index">

    <div class="jumbotron">
        <h3>Карточка пользователя <?php echo Html::encode($user->username);?></h3>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h4>Логин: <?php echo Html::encode($user->username);?></h4>
                <h4>Ник: <?php echo Html::encode($user->nickname);?></h4>
                <h4>email: <?php echo Html::encode($user->email);?></h4>
                <a href="<?php echo Url::to(['/user/profile/subscribe', 'id' => $user->getID()]);?>" class="btn btn-info">Подписаться</a>
                <a href="<?php echo Url::to(['/user/profile/unsubscribe', 'id' => $user->getID()]);?>" class="btn btn-warning">Отписаться</a>
                <hr>
                <p>О себе:</p>
                <p><?php echo HTMLPurifier::process($user->about);?></p>
            </div>
    </div>
</div>
