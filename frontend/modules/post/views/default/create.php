<?php
/**
 * @var $this yii\web\View
 * @var $model frontend\modules\post\models\PostForm
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
;?>

<div class="post-default-index">
    <h1>Создание нового поста</h1>
    <?php $form = Activeform::begin(); ?>

    <?php echo $form->field($model, 'picture')->fileInput(); ?>
    <?php echo $form->field($model, 'description'); ?>
    <?php echo Html::submitButton('Создать'); ?>
    <?php ActiveForm::end(); ?>


</div>
