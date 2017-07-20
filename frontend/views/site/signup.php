<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p class="text-center">Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username', ['options' => [
                    'tag' => 'div',
                    'class' => 'form-group /*field-*/signupform-username has-feedback required'
                ], 'template' => '{label}{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}'
                ])->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email', ['options' => [
                    'tag' => 'div',
                    'class' => 'form-group /*field-*/signupform-email has-feedback required'
                ], 'template' => '{label}{input}<span class="glyphicon glyphicon-globe form-control-feedback"></span>{error}{hint}'
                ]) ?>

                <?= $form->field($model, 'password' , ['options' => [
                    'tag' => 'div',
                    'class' => 'form-group /*field-*/signupform-password has-feedback required'
                ], 'template' => '{label}{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'
                ])->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-success btn-block btn-lg', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
