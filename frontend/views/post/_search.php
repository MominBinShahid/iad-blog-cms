<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>



    <!-- <?= $form->field($model, 'post_id') ?> -->

    <?= $form->field($model, 'post_title') ?>

    <?= $form->field($model, 'post_content') ?>

    <?= $form->field($model, 'post_uploader') ?>

    <!-- <?= $form->field($model, 'post_timestamp') ?> -->

    <?php // echo $form->field($model, 'post_image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
