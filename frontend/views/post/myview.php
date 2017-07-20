<?php
use yii\helpers\Html;

date_default_timezone_set('Asia/Karachi');

$this->title = $model->post_title;

?>


<div class="posts_wrapper">
    

<div class="text-left">
 <?= Html::a('<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back to Posts', ['my-index'], ['class' => 'btn btn-default btn-sm']) ?>
<div>

<?php 
    if(!Yii::$app->user->isGuest)
    {
        if(Yii::$app->user->identity->id === $model->post_uploader)
       {
    ?>

    <div class="text-right">
        <?= Html::a('<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Update Your Post', ['update', 'id' => $model->post_id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Your Post', ['delete', 'id' => $model->post_id], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
<?php
       }
    }
    else
    {
       // die('login kar');
    }
 ?>

    <h1><?= $model->post_title ?></h1>
    
    <span class="text-muted">written by </span>
    <span class="text-primary">
    <!-- <?= $model->post_uploader ?>     -->
    <?= $model->postUploader->username ?>    
    </span>
    
    <br>

    <?php if($model->post_update_timestamp != 0) 
            {
    ?>

    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> <i> Updated <?= Yii::$app->formatter->asRelativeTime($model->post_update_timestamp) ?> </i>

    <br>
    
    <?php
            }
    ?>


    <br>
    
    <div class='well'>
    
    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Posted on <?= Yii::$app->formatter->asDate($model->post_timestamp) ?> at <?= Yii::$app->formatter->asTime($model->post_timestamp) ?> (<?= Yii::$app->formatter->asRelativeTime($model->post_timestamp) ?>) 

    </div>
    
    
    <?php if($model->post_image != '') 
        {
        ?>
        
        <div class="" style="">
        <a href="../uploads/<?= $model->post_image ?>" download><img src="../uploads/<?= $model->post_image ?>" style="margin: auto; height: 400px;" class="img-rounded img-responsive"></a>
        <div class="text-muted text-center">Click on the image to download  </div>
        </div>

        <br>    
    <?php 
        }
        else
        {
    ?>

    <div class="text-center">
    <h3>No Image Uploaded</h3>    
    </div>
    

    <?php
        }
    ?>


    <p style="text-align: justify; text-justify: inter-word;">

    <?= nl2br($model->post_content) ?>
    </p>


         
</div>

<style type="text/css">
	
hr.styleHR {
	height: 10px;
	border: 0;
	box-shadow: 0 10px 10px -10px #8c8b8b inset;
}

</style>
<hr class="styleHR">