<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Team;

/**
 * TeamSeach represents the model behind the search form of `common\models\Team`.
 */
class TeamSeach extends Team
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['full_name_uz', 'full_name_ru', 'full_name_en', 'post_uz', 'post_ru', 'post_en', 'pic'], 'safe'],
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
        $query = Team::find();

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
            ->andFilterWhere(['like', 'post_uz', $this->post_uz])
            ->andFilterWhere(['like', 'post_ru', $this->post_ru])
            ->andFilterWhere(['like', 'post_en', $this->post_en])
            ->andFilterWhere(['like', 'pic', $this->pic]);

        return $dataProvider;
    }
}
