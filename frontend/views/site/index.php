<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\web\JqueryAsset;

$this->title = 'Imagepost';
?>
    <!-- Header -->
    <header id="head">
        <div class="container">
            <div class="row">
                <h1 class="lead">Делитесь фото, всегда и везде</h1>
                <p class="tagline">free business bootstrap template by <a
                            href="http://www.gettemplate.com/?utm_source=progressus&amp;utm_medium=template&amp;utm_campaign=progressus">GetTemplate</a>
                </p>
                <p><a class="btn btn-default btn-lg" role="button">войти</a> <a class="btn btn-action btn-lg"
                                                                                role="button">зарегистриоваться</a></p>
            </div>
        </div>
    </header>
    <!-- /Header -->
<div class="container">
    <div class="site-index">
        <div class="body-content">

            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($feedItems as $post): ?>
                        <a href="<?php echo Url::to(['/post/default/view', 'id' => ($post->post_id)]); ?>">
                            <img src="<?php echo Yii::$app->storage->getFile($post->post_filename); ?>" alt="" id="">
                        </a>
                        <div class="col-md-12">
                            <a type="button"
                               class="button button-like <?php echo ($currentUser && $currentUser->likesPost($post->post_id)) ? "display-none" : ""; ?>"
                               aria-label="Left Align" data-id="<?php echo $post->post_id; ?>">
                                <span class="glyphicon glyphicon-heart-empty aria-hidden=" true""
                                aria-hidden="true"></span>
                            </a>

                            <a type="button"
                               class="button button-unlike <?php echo ($currentUser && $currentUser->likesPost($post->post_id)) ? "" : "display-none"; ?>"
                               aria-label="Left Align" data-id="<?php echo $post->post_id; ?>">
                                <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            </a>
                            <span> Нравиться </span>
                            <span class="likes-count">
                            <?php
                            echo $post->countLikes();
                            ?>
                        </span>
                        </div>
                        <br>
                        <a href="<?php echo Url::to(['/user/profile/view', 'nickname' => ($post->author_nickname)]); ?>"><?php echo $post->author_nickname;; ?></a>
                        <p><?php echo Yii::$app->formatter->asDatetime($post->post_created_at); ?></p>
                        <br>
                        <?php echo HtmlPurifier::process($post->post_description); ?>
                        <hr>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->registerJsFile('@web/js/likes.js', [
    'depends' => JqueryAsset::className(),
]); ?>