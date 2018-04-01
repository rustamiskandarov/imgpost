<?php

/* @var $this yii\web\View */

$this->title = 'Profile';
?>
<div class="site-index">

    <div class="jumbotron">
        <h3>Добро пожаловать <?php echo $user->username;?></h3>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h4>Ваш логин: <?php echo $user->username;?></h4>
                <h4>Ваш email: <?php echo $user->email;?></h4>
            </div>
    </div>
</div>
