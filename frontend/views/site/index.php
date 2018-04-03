<?php

/* @var $this yii\web\View */

$this->title = 'Imagepost';
?>
<div class="site-index">
    <div class="body-content">


        <div class="row">
            <div class="col-md-12">
                <?php foreach ($users as $user): ?>
                    <a href="<?php echo \yii\helpers\Url::to(['/user/profile/view', 'nickname' => $user->getNickname()]);?>">
                        <?php echo $user->username; ?>
                    </a>
                    <?php echo '| '.$user->nickname.' | '; ?>
                    <?php echo $user->email; ?>
                    <hr>
                <?php endforeach;?>
            </div>
        </div>

    </div>
</div>
