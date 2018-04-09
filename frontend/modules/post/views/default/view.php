<?php
/* @var $this yii\web\View */
/* @var $post frontend\models\Post */

use yii\helpers\Html;
use yii\web\JqueryAsset;

; ?>

<div class="i">
    <div class="col-md-12">
        <span class="likes-count">
                <?php
                echo $post->countLikes();
                ?>
            </span>
        <a type="button" class="button button-like <?php echo ($currentUser && $post->isLikedBy($currentUser)) ? "display-none" : ""; ?>" aria-label="Left Align" data-id="<?php echo $post->id; ?>">
            <span class="glyphicon glyphicon-heart-empty aria-hidden="true"" aria-hidden="true"></span>
        </a>

        <a type="button" class="button button-unlike <?php echo ($currentUser && $post->isLikedBy($currentUser)) ? "" : "display-none"; ?>" aria-label="Left Align" data-id="<?php echo $post->id; ?>">
            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
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
