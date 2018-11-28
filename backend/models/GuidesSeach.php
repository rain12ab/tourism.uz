<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Guides;

/**
 * GuidesSeach represents the model behind the search form of `common\models\Guides`.
 */
class GuidesSeach extends Guides
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['full_name_uz', 'full_name_ru', 'full_name_en', 'languages', 'phone', 'email', 'pic'], 'safe'],
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
        $query = Guides::find();

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
        ]);

        $query->andFilterWhere(['like', 'full_name_uz', $this->full_name_uz])
            ->andFilterWhere(['like', 'full_name_ru', $this->full_name_ru])
            ->andFilterWhere(['like', 'full_name_en', $this->full_name_en])
            ->andFilterWhere(['like', 'languages', $this->languages])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'pic', $this->pic]);

        return $dataProvider;
    }
}
