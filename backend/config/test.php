<?php
return [
    'id' => 'app-backend-tests',
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\Admin',    
        ],
    ],
];
