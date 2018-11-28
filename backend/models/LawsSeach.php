<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Laws;

/**
 * LawsSeach represents the model behind the search form of `common\models\Laws`.
 */
class LawsSeach extends Laws
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lawtype_id'], 'integer'],
            [['name_uz', 'name_ru', 'url_uz', 'url_ru', 'date'], 'safe'],
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
        $query = Laws::find();

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
            'lawtype_id' => $this->lawtype_id,
        ]);

        $query->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'url_uz', $this->url_uz])
            ->andFilterWhere(['like', 'url_ru', $this->url_ru])
            ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
