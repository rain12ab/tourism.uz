<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Message;
use yii\data\Sort;

/**
 * MessageSearch represents the model behind the search form about `app\models\Message`.
 */
class MessageSearch extends Message
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','page_size'], 'integer'],
            [['language', 'translation'], 'safe'],
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
        $query = Message::find();


        $sort = new Sort();
        $sort->defaultOrder = ['id'=>SORT_DESC];
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>$sort,
            'pagination'=>[
                'pageSize'=>(isset($params['MessageSearch']['page_size']) and $params['MessageSearch']['page_size']>=20)?$params['MessageSearch']['page_size']:20
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'translation', $this->translation]);

        return $dataProvider;
    }
}
