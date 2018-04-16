<?php
/**
 * @var $this yii\web\View
 * @var $model frontend\modules\post\models\PostForm
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
;?>

<div class="container">
    <div class="post-default-index">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>Создать новый пост</h1>
        <?php $form = Activeform::begin(); ?>

        <?php echo $form->field($model, 'picture')->fileInput(); ?>
        <?php echo $form->field($model, 'description'); ?>
        <?php echo Html::submitButton('Создать'); ?>
        <?php ActiveForm::end(); ?>


    </div>

</div>