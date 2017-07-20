<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p class="text-center">Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username', ['options' => [
                    'tag' => 'div',
                    'class' => 'form-group /*field-*/loginform-username has-feedback required'
                ], 'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}'
                ])->textInput(['autofocus' => true, 'placeholder' => 'Username'])//->hint('Enter Your Username'); ?>

                <?= $form->field($model, 'password', ['options' => [
                    'tag' => 'div',
                    'class' => 'form-group /*field-*/loginform-password has-feedback required'
                ], 'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'
                ])->passwordInput(['placeholder' => 'Password']) ?>

                <?= $form->field($model, 'rememberMe')->checkbox(['data-toggle'=>'toggle', 'data-onstyle'=>'primary']) ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>

                <div class="text-center text-muted">  
                Haven`t sign up already, sign up now
                <br>
                <br>
                </div>
            <?php ActiveForm::end(); ?>

                <?= Html::a('Sign Up', ['signup'], ['class' => 'btn btn-success btn-block ']) ?>
        
        </div>
    </div>
</div>
