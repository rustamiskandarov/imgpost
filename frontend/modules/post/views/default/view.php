<?php
/* @var $this yii\web\View */

/* @var $post frontend\models\Post */

use yii\helpers\Html;
use yii\web\JqueryAsset;

; ?>

<div class="site-index">
    <div class="container">

        <div class="col-md-8">
            <a type="button"
               class="button button-like <?php echo ($currentUser && $post->isLikedBy($currentUser)) ? "display-none" : ""; ?>"
               aria-label="Left Align" data-id="<?php echo $post->id; ?>">
                <span class="glyphicon glyphicon-heart-empty aria-hidden=" true"" aria-hidden="true"></span>
            </a>

            <a type="button"
               class="button button-unlike <?php echo ($currentUser && $post->isLikedBy($currentUser)) ? "" : "display-none"; ?>"
               aria-label="Left Align" data-id="<?php echo $post->id; ?>">
                <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
            </a>
            <span class="likes-count"> Нравиться:
                <?php
                echo $post->countLikes();
                ?>
            </span>
            <div class="row">
                <img src="<?php echo $post->getImage(); ?>" alt="">

            </div>
            <?php if($post->description):; ?>
                <p>
                    <?php echo Html::encode($post->description); ?>
                </p>
            <?php endif; ?>

            <p>
                <?php echo Html::encode($post->filename); ?>
            </p>
        </div>
    </div>
</div>

<?php $this->registerJsFile('@web/js/likes.js', [
    'depends' => \yii\web\JqueryAsset::className(),
]);

?>
