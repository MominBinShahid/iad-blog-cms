<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<style type="text/css">
	p {
		font-size: 1.3em;
	}
</style>

    <p>This is a blog site where you can read blogs from others on various topics or you can sign up for your own account right away to create your own content </p>
    <p>Don`t want to sign up and still want to dig in, no problem you can read blogs as a guest and can sign up any time you want</p>
    <p>If you can access this site as admin then you can edit any content and supervise site integrity and wrong content</p>

    <!-- <code><?= __FILE__ ?></code> -->
</div>
