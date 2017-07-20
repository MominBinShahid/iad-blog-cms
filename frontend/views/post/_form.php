<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'post_title')->textInput(['maxlength' => true, 'placeholder'=>'Give your post a title']) ?>

    <?= $form->field($model, 'post_content')->textarea(['rows' => 6, 'style' => 'resize:vertical', 'placeholder'=>'Start writing your post here']) ?>

    <!-- <?= $form->field($model, 'post_uploader')->textInput() ?> -->

    <!-- <?= $form->field($model, 'post_timestamp')->textInput() ?> -->

    <?= $form->field($model, 'post_image')->fileInput()->hint("Uploading file is optional") ?>


     <img id="blah" src="#" alt="" class="img-rounded img-responsive" />


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload Post' : '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update Post', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
