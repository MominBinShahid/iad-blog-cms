<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
class PostSearch extends Post
{

    public $mainSearch;    

    public function rules()
    {
        return [
            [['post_id', 'post_timestamp', 'post_update_timestamp'], 'integer'],
            [['post_title', 'post_content', 'post_image', 'post_uploader',  'mainSearch'], 'safe'],
        ];
    }

    
     public function attributeLabels()
    {
        return [
            'mainSearch' => 'Search here',
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->joinWith('postUploader');


        // grid filtering conditions
        $query->andFilterWhere([
            'post_id' => $this->post_id,
            // 'post_uploader' => $this->post_uploader,
            'post_timestamp' => $this->post_timestamp,
            'post_update_timestamp' => $this->post_update_timestamp,
        ]);

        $query->andFilterWhere(['like', 'post_title', $this->post_title])
            ->andFilterWhere(['like', 'post_content', $this->post_content])
            // ->andFilterWhere(['like', 'post_image', $this->post_image])
            ->andFilterWhere(['like', 'user.username', $this->post_uploader]);



            // for main search

        $query->orFilterWhere(['like', 'post_title', $this->mainSearch])
            ->orFilterWhere(['like', 'post_content', $this->mainSearch])
            // ->orFilterWhere(['like', 'post_image', $this->mainSearch])
            ->orFilterWhere(['like', 'user.username', $this->mainSearch]);

        return $dataProvider;
    }
}
