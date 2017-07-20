<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="post-search text-center">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>



    <?= $form->field($model, 'mainSearch')->textInput(['placeholder' => 'Search for post titles, uploaders, or posts itself']) ?>


    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Search', ['class' => 'btn btn-primary btn-sm ']) ?>
        <!-- <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?> -->
    </div>

    <?php ActiveForm::end(); ?>

</div>
