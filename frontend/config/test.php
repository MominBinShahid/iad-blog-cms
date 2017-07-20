<?php
return [
    'id' => 'app-frontend-tests',
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\User',    
        ],
    ],
];