<style>
    

.issue {
    max-width : 400px !important;
    overflow-x : hidden !important;
    white-space: nowrap !important;
    text-overflow: ellipsis !important;
}


</style>



<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

date_default_timezone_set('Asia/Karachi');


$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo $this->render('_mainSearch', ['model' => $searchModel]); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'post_id',
            'post_title',
            
            // 'post_content:ntext',
            [
                'label' => 'Post Content',
                'attribute' => 'post_content',
                'value' => 'post_content', 
                'format' => 'ntext',
                 /*for td*/ 'contentOptions' => ['class' => 'issue'],
                 /*for th*/ 'headerOptions' => ['class' => '']

            ],

            // 'post_uploader',
            [
                'attribute' => 'post_uploader',
                'value' => 'postUploader.username'
            ],

            // 'post_timestamp:datetime',
            [
                'label' => 'Post Created',
                // 'attribute' => 'post_timestamp',
                'value' => 'post_timestamp', 
                'format' => 'relativeTime',
            ],

            // 'post_update_timestamp:datetime',
           

            // 'post_image',

            [
                    'label' => 'View Post',
                    'attribute'=>'Task_Title',
                    'format'=>'raw',
                    'value' => function($data)
                    {
                        return
                        Html::a('View', ['post/view','id'=>$data->post_id], ['title' => 'View','class'=>'no-pjax']);
                    },
            ],

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
