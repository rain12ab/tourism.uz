<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reception;

/**
 * ReceptionSearch represents the model behind the search form of `common\models\Reception`.
 */
class ReceptionSearch extends Reception
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type', 'datetime', 'status'], 'integer'],
            [['full_name', 'message', 'file', 'title', 'organization', 'phone', 'email', 'passport', 'unique_number'], 'safe'],
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
        $query = Reception::find();

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
            'type' => $this->type,
            'datetime' => $this->datetime,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'organization', $this->organization])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'unique_number', $this->unique_number]);

        return $dataProvider;
    }
}
