<?php

namespace common\models;

use Yii;

class Post extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            [['post_title', 'post_content', 'post_uploader', 'post_timestamp', 'post_update_timestamp'], 'required'],
            [['post_content'], 'string'],
            [['post_uploader', 'post_timestamp', 'post_update_timestamp'], 'integer'],
            [['post_title'], 'string', 'max' => 255],
            // [['post_image'], 'string', 'max' => 535],
            [['post_image'], 'file', 'extensions' => 'png, jpeg, jpg, gif'],
            [['post_uploader'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['post_uploader' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'post_title' => 'Post Title',
            'post_content' => 'Post Content',
            'post_uploader' => 'Post Uploader',
            'post_timestamp' => 'Post Timestamp',
            'post_update_timestamp' => 'Post Update Timestamp',
            'post_image' => 'Upload Image For Your Post',
        ];
    }

    public function getPostUploader()
    {
        return $this->hasOne(User::className(), ['id' => 'post_uploader']);
    }
}
