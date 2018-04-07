<?php
use yii\helpers\Html;

; ?>

<div class="i">
    <div class="col-md-12">
        <?php if($post->user): ?>
        <p>
            <?php echo Html::encode($post->user->username); ?>
        </p>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <img src="<?php echo $post->getImage(); ?>" alt="">
        </div>

    </div>
    <div class="col-md-12">
        <p>
            <?php echo Html::encode($post->description); ?>
        </p>
    </div>
    <div class="col-md-12">
        <p>
            <?php echo Html::encode($post->filename); ?>
        </p>
    </div>
</div>
