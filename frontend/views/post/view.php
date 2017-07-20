<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

date_default_timezone_set('Asia/Karachi');
 

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->post_id;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

<?php 
    if(!Yii::$app->user->isGuest)
    {
        if(Yii::$app->user->identity->id === $model->post_uploader)
       {
    ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->post_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->post_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php
       }
    }
    else
    {
       // die('login kar');
    }
 ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

             // 'post_id',

            // 'post_title',
            [
                'attribute'=>'post_title',
                'value' => '<b>'.$model->post_title.'</b>',
                'format' => 'raw',
                'contentOptions' => ['class' => 'text-info'],     // HTML attributes to customize value tag
                'captionOptions' => ['class' => 'text-default'],  // HTML attributes to customize label tag
            ],
            
            'post_content:ntext',
            
            // 'post_uploader',
            // 'postUploader.username',
            [
                'label' => 'Post Uploader',
                'attribute' => 'postUploader.username',
            ],

            'post_timestamp:relativeTime',

            // 'post_update_timestamp:relativeTime',
            [
                'label' => 'update post time',
                'attribute' => 'post_update_timestamp',
                'value' => function ($model) {
                    return (($model->post_update_timestamp == 0) ? 'No updates yet' : $model->post_update_timestamp);
                },
                'format' => [(($model->post_update_timestamp == 0) ? 'raw' : 'relativeTime')],
                //'visible' => \Yii::$app->user->can('posts.owner.view'),
            ],
            
            // 'post_image:image',
            [
                'label' => 'Post Image',
                'attribute' => 'post_image',
                'value' => function ($model) {
                    return (($model->post_image == NULL) ? 'No Image was uploaded' : '../uploads/' . $model->post_image);
                },  //'../uploads/' . $model->post_image,
                'format' => (($model->post_image == NULL) ? ['raw'] : ['image',['height'=>'300']]),
            ],
            /*[
                'label' => 'Post Image',
                'attribute' => 'post_image',
                'value' => '../uploads/' . $model->post_image,
                'format' => ['image',['height'=>'300']],
                'visible' => (($model->post_image == NULL)? false : true),
            ],*/
        ],

        //'template' => '<tr><td><img src="../uploads/{value}"></td></tr>'
    
    ]) ?>

</div>
