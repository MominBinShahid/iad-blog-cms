<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' =>  Html::img('@web/images/cms_logo.png', ['alt'=>Yii::$app->name, 'class'=>'navBarLogo logoPos']),
        'brandOptions' => ['class' => 'logoPos'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    $menuItemAdmin = [
        ['label' => Html::tag('span','',['class' => 'glyphicon glyphicon-cog']) . ' Admin Panel', 'url' => ['/site/admin']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItemsRight[] = ['label' => 'Signup ', 'url' => ['/site/signup']];
        $menuItemsRight[] = ['label' => 'Login ' . Html::tag('span','',['class' => 'glyphicon glyphicon-log-in']), 'url' => ['/site/login']];
    } else {
        $menuItemsRight[] = ['label' => 'signed in as ' . Yii::$app->user->identity->username, 'class' => 'text-muted'];
        $menuItemsRight[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout ' . Html::tag('span','',['class' => 'glyphicon glyphicon-log-out']),
                [
                'class' => 'btn btn-link logout',
                'data' => [
                'confirm' => Yii::$app->user->identity->username . ' Are you sure you want to logout?',
                'method' => 'post',
                    ]
                ]
            )
            . Html::endForm()
            . '</li>';
    }
    echo Html::tag('b', Nav::widget(['options' => ['class' => 'navbar-nav navbar-left text-center'], 'items' => $menuItemAdmin, 'encodeLabels' => false,]) , ['class' => 'text-danger']);
    /*echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left text-center'],
        'items' => $menuItemAdmin,
    ]);*/
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left text-center'],
        'items' => $menuItems,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right text-center'],
        'encodeLabels' => false,
        'items' => $menuItemsRight,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Content Management System <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
