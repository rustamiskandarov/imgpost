<?php

/* @var $this yii\web\View */
/* @var $user frontend\models\User*/
/* @var $currentUser frontend\models\User*/
/* @var $modelPicture  frontend\modules\user\models\forms\PictureForm;*/

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use dosamigos\fileupload\FileUpload;

$this->title = 'Profile';
?>
<div class="site-index">

    <div class="jumbotron">
        <h3>Карточка пользователя <?php echo Html::encode($user->username);?></h3>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <?= FileUpload::widget([
                    'model' => $modelPicture,
                    'attribute' => 'picture',
                    'url' => ['profile/upload-picture'], // your url, this is just for demo purposes,
                    'options' => ['accept' => 'image/*'],
                    'clientOptions' => [
                        'maxFileSize' => 2000000
                    ],
                    // Also, you can specify jQuery-File-Upload events
                    // see: https://github.com/blueimp/jQuery-File-Upload/wiki/Options#processing-callback-options
                    'clientEvents' => [
                        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                    ],
                ]); ?>
                <h4>Логин: <?php echo Html::encode($user->username);?></h4>
                <h4>Ник: <?php echo Html::encode($user->nickname);?></h4>
                <h4>email: <?php echo Html::encode($user->email);?></h4>
                <a href="<?php echo Url::to(['/user/profile/subscribe', 'id' => $user->getID()]);?>" class="btn btn-info">Подписаться</a>
                <a href="<?php echo Url::to(['/user/profile/unsubscribe', 'id' => $user->getID()]);?>" class="btn btn-warning">Отписаться</a>
                <hr>
                <p>О себе:</p>
                <p><?php echo HTMLPurifier::process($user->about);?></p>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <?php echo $user->countSubscriptions()?> Подписчиков
                </a>
                <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                    <?php echo $user->countFollowers()?> Подписавшихся
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="well">
                        <?php foreach ($user->getSubscriptions() as $subscription): ?>
                            <a href="<?php echo Url::to(['/user/profile/view', 'nickname'=> ($subscription['nickname']) ? $subscription['nickname']:$subscription['id']]);?>">
                                <?php echo Html::encode($subscription['username']);?>
                            </a>
                            <hr>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="collapse" id="collapseExample2">
                    <div class="well">
                        <?php foreach ($user->getFollowers() as $follower): ?>
                            <a href="<?php echo Url::to(['/user/profile/view', 'nickname'=> ($follower['nickname']) ? $follower['nickname']:$follower['id']]);?>">
                                <?php echo Html::encode($follower['username']);?>
                                <hr>
                            </a>
                        <?php endforeach;?>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if($currentUser):?>
                        <p><?php echo "Ваши друзья которые тоже подписаны:";?></p>

                <?php foreach($currentUser->getMutualSubscriptionsTo($user) as $item):?>
                    <a href=""<?php echo Url::to(['/user/profile/view', 'nickname'=> ($follower['nickname']) ? $follower['nickname']:$follower['id']]);?>"">
                        <?php echo Html::encode($user->username).' | '. Html::encode($user->nickname);?>
                    </a>
                <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
