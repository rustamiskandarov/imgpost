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

    <div class="col-md-12">
        <a type="button" class="btn btn-default button-like" aria-label="Left Align" <?php echo ($currentUser && $post->isLikedBy($currentUser)) ? "display-none":""; ?> data-id="<?php echo $post->id; ?>">
            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
            <span class="likes-count">
                <?php
                echo $post->countLikes();
                ?>
            </span>
        </a>
        <?php echo $post->isLikedBy($currentUser); ?>
        <?php print_r($currentUser) ; ?>
        <a type="button" class="btn btn-default button-unlike" aria-label="Left Align" <?php echo ($currentUser && $post->isLikedBy($currentUser))?"":"display-none"; ?> data-id="<?php echo $post->id; ?>"    >
            <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
        </a>
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

<?php $this->registerJsFile('@web/js/likes.js', [
        'depends' => \yii\web\JqueryAsset::className(),
]);

?>
