<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Language;
use yii\data\Sort;

/**
 * LanguageSearch represents the model behind the search form about `app\models\Language`.
 */
class LanguageSearch extends Language
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'language_code_id', 'position'], 'integer'],
            [['name', 'status', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Language::find();
        $sort = new Sort();

        $sort->defaultOrder = ['position'=>SORT_ASC];
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>$sort
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'language_code_id' => $this->language_code_id,
            'position' => $this->position,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
