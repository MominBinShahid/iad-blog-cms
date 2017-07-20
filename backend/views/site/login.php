
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Admin Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p class="text-center text-muted">Welcome Admin, please enter credentials to login:</p>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Enter Your Username']) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter Your Password']) ?>
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  .toggle.ios .toggle-handle { border-radius: 20px; }
</style>
                <?= $form->field($model, 'rememberMe')->checkbox(['data-toggle'=>'toggle', 'data-onstyle'=>'success', 'data-style'=>'ios']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success center-block btn-block', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
