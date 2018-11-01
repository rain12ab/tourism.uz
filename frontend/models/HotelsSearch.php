<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hotels;

/**
 * HotelsSearch represents the model behind the search form of `common\models\Hotels`.
 */
class HotelsSearch extends Hotels
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stars', 'phone'], 'integer'],
            [['name', 'content_uz', 'content_ru', 'content_en', 'email', 'adress_uz', 'adress_ru', 'adress_en', 'pic1', 'pic2', 'pic3', 'pic4'], 'safe'],
            [['lat', 'lng'], 'number'],
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
        $query = Hotels::find();

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
            'stars' => $this->stars,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content_uz', $this->content_uz])
            ->andFilterWhere(['like', 'content_ru', $this->content_ru])
            ->andFilterWhere(['like', 'content_en', $this->content_en])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'adress_uz', $this->adress_uz])
            ->andFilterWhere(['like', 'adress_ru', $this->adress_ru])
            ->andFilterWhere(['like', 'adress_en', $this->adress_en])
            ->andFilterWhere(['like', 'pic1', $this->pic1])
            ->andFilterWhere(['like', 'pic2', $this->pic2])
            ->andFilterWhere(['like', 'pic3', $this->pic3])
            ->andFilterWhere(['like', 'pic4', $this->pic4]);

        return $dataProvider;
    }
}
