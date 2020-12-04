<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\News;

/**
 * NewsSearch represents the model behind the search form of `app\models\News`.
 */
class NewsSearch extends News
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'views', 'likee', 'dislike', 'slider', 'AuthorID'], 'integer'],
            [['title', 'news', 'img', 'img2', 'img3', 'img4', 'img5', 'img6', 'img7', 'img8', 'lang', 'ay', 'gun', 'il', 'saat', 'category', 'youtube', 'img9', 'img10', 'img11', 'img12', 'img13', 'img14', 'img15', 'img16', 'img17', 'img18', 'img19', 'img20', 'facebook'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
        $query = News::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'views' => $this->views,
            'likee' => $this->likee,
            'dislike' => $this->dislike,
            'slider' => $this->slider,
            'AuthorID' => $this->AuthorID,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'news', $this->news])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'img2', $this->img2])
            ->andFilterWhere(['like', 'img3', $this->img3])
            ->andFilterWhere(['like', 'img4', $this->img4])
            ->andFilterWhere(['like', 'img5', $this->img5])
            ->andFilterWhere(['like', 'img6', $this->img6])
            ->andFilterWhere(['like', 'img7', $this->img7])
            ->andFilterWhere(['like', 'img8', $this->img8])
            ->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'ay', $this->ay])
            ->andFilterWhere(['like', 'gun', $this->gun])
            ->andFilterWhere(['like', 'il', $this->il])
            ->andFilterWhere(['like', 'saat', $this->saat])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'youtube', $this->youtube])
            ->andFilterWhere(['like', 'img9', $this->img9])
            ->andFilterWhere(['like', 'img10', $this->img10])
            ->andFilterWhere(['like', 'img11', $this->img11])
            ->andFilterWhere(['like', 'img12', $this->img12])
            ->andFilterWhere(['like', 'img13', $this->img13])
            ->andFilterWhere(['like', 'img14', $this->img14])
            ->andFilterWhere(['like', 'img15', $this->img15])
            ->andFilterWhere(['like', 'img16', $this->img16])
            ->andFilterWhere(['like', 'img17', $this->img17])
            ->andFilterWhere(['like', 'img18', $this->img18])
            ->andFilterWhere(['like', 'img19', $this->img19])
            ->andFilterWhere(['like', 'img20', $this->img20])
            ->andFilterWhere(['like', 'facebook', $this->facebook]);

        return $dataProvider;
    }
}
