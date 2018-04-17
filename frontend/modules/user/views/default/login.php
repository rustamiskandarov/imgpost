<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход на сайт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">

        <!-- Article main content -->
        <div class="col-xs-12 maincontent">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Войдите в свой аккаунт.</h3>
                        <hr>
                            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>



                            <div class="top-margin">
                                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                            </div>
                            <div class="top-margin">
                                <?= $form->field($model, 'password')->passwordInput() ?>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                                </div>
                                <div class="col-lg-4">
                                    <?= yii\authclient\widgets\AuthChoice::widget([
                                        'baseAuthUrl' => ['/user/default/auth'],
                                        'popupMode' => false,
                                    ]) ?>
                                </div>
                            </div>
                            <div style="color:#999;margin:1em 0">
                                Забыли пароль? <?= Html::a('Восстановить', ['default/request-password-reset']) ?>.
                            </div>

                            <div class="form-group">
                                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>



                    </div>
                </div>

            </div>

        </div>
        <!-- /Article -->

    </div>

</div>
