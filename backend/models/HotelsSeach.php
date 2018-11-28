<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hotels;

/**
 * HotelsSeach represents the model behind the search form of `common\models\Hotels`.
 */
class HotelsSeach extends Hotels
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stars', 'phone', 'district_id', 'hotel_type', 'price'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'content_uz', 'content_ru', 'content_en', 'email', 'adress_uz', 'adress_ru', 'adress_en', 'pic_main', 'pictures'], 'safe'],
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
            'district_id' => $this->district_id,
            'hotel_type' => $this->hotel_type,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'content_uz', $this->content_uz])
            ->andFilterWhere(['like', 'content_ru', $this->content_ru])
            ->andFilterWhere(['like', 'content_en', $this->content_en])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'adress_uz', $this->adress_uz])
            ->andFilterWhere(['like', 'adress_ru', $this->adress_ru])
            ->andFilterWhere(['like', 'adress_en', $this->adress_en])
            ->andFilterWhere(['like', 'pic_main', $this->pic_main])
            ->andFilterWhere(['like', 'pictures', $this->pictures]);

        return $dataProvider;
    }
}
