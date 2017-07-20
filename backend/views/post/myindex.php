<?php 

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;


date_default_timezone_set('Asia/Karachi');

 ?>





    <div class="jumbotron">
    <?php 
    if(!Yii::$app->user->isGuest)
    {
    ?>

        <h1>Congratulations!</h1>

        <p class="lead">You have successfully login in as <?= Yii::$app->user->identity->username ?> </p>

    <?php
    } 
    else
    {
    ?>

        <h1>Welcome to the Site!</h1>

        <p class="lead">You can read the blog below or sign up now to create you own content </p>


    <?php
    }
     ?>


        <div class="text-center">
         <?= Html::a('<span class="glyphicon glyphicon-globe"></span> Share your througts with your viewer', ['create'], ['class' => 'btn btn-primary btn-lg']) ?>
         <?= Html::tag('p', 'Following are the posts on this blog', ['class' => 'text-muted']) ?>
        </div>
    </div>

<?php 

    foreach ($posts as $no => $post) {

?>



<div class="posts_wrapper" style="position: relative;">
    

    <h1><?= $post->post_title ?></h1>
    
    <span class="text-muted">written by </span>
    <span class="text-primary">
    <!-- <?= $post->post_uploader ?>     -->
    <?= $post->postUploader->username ?>    
    </span>
    
    <br>

    <?php if($post->post_update_timestamp != 0) 
            {
    ?>

    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> <i> Updated <?= Yii::$app->formatter->asRelativeTime($post->post_update_timestamp) ?> </i>

    <br>
    
    <?php
            }
    ?>


    <br>
    
    <div class='well'>
    
    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Posted on <?= Yii::$app->formatter->asDate($post->post_timestamp) ?> at <?= Yii::$app->formatter->asTime($post->post_timestamp) ?> (<?= Yii::$app->formatter->asRelativeTime($post->post_timestamp) ?>) 

    </div>
    
    
    <?php if($post->post_image != '') 
        {
        ?>
        
        <div class="text-center">
        <img src="http://cms.com/uploads/<?= $post->post_image ?>" style="width: 700px" class="img-thumbnail img-responsive">    
        </div>

        <br>    
    <?php 
        }
        else
        {
    ?>
<!-- 
    <div class="text-center">
    <h4>No Image Uploaded</h4>    
    </div>
 -->    

    <?php
        }
    ?>


    <p style="text-align: justify; text-justify: inter-word;
     max-height: 250px;
     /*white-space: normal;*/
     overflow: hidden;
     /*text-overflow: ellipsis;*/

     border-bottom: 1px #aaa dashed;


     ">

    <?= nl2br($post->post_content) ?>
    </p>

    <a href="/post/my-view?id=<?= $post->post_id ?>" style="
        position: absolute;
        left: 50%;
        margin-left: -50px;
        bottom: -15px;
    ">
    <button class="btn btn-success">Read More...</button>
    </a>

         
</div>

    <br>
    <br>
    <style type="text/css">
                

        hr.styleHR { 
          border: 0; 
          height: 1px; 
          background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
          background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
          background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
          background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0); 
        }



    </style>
    <hr class="styleHR" >
    <br>

<?php

    }

 ?>


<br>

<!-- 
    <h1>post_title</h1>
    <i>by </i>&nbsp;<span class="text-primary">post_uploader</span>
    <br>
    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <i> post_timestamp Posted on August 24, 2013 at 9:00 PM</i>
    <br>
    <br>
    <div class='well'>

    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> post_update_timestamp Updated on August 24, 2013 at 9:00 PM

    </div>
    <br>
    
    <div class="text-center">
    post_image
    <img src="http://via.placeholder.com/1920x1080" style="width: 900px">    
    </div>

    <br>    

    <p>
    post_content
    kasjjdlaksjdlkasda slkdalsjdalksdjaslldkjasd asslkdasjdklajsdlkasjda sdlaksdjaskldjasd
    asdjaklsdjasljkdjasda
    s
    djasdklasjdalskdjalksdjaslkjd
    </p>
     -->