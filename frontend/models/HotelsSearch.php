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
    public $hotel_name;
    public $type;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stars', 'phone'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'content_uz', 'content_ru', 'content_en', 'email', 'adress_uz', 'adress_ru', 'adress_en', 'pic_main', 'pictures', 'hotel_name'], 'safe'],
            [['lat', 'lng', 'type'], 'number'],
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

        if (!$this->load($params)) {}

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
            'hotel_type' => $this->type,
        ]);

        if(Yii::$app->language == 'uz')
            {
                $query->andFilterWhere(['like', 'name_uz', $this->hotel_name]);
            }
        else if(Yii::$app->language == 'ru')
            {
                $query->andFilterWhere(['like', 'name_ru', $this->hotel_name]);
            }
        else if(Yii::$app->language == 'en')
            {
                $query->andFilterWhere(['like', 'name_en', $this->hotel_name]);
            }
        else
            {
                $query = null;
            }

        $query->andFilterWhere(['like', 'content_uz', $this->content_uz])
            ->andFilterWhere(['like', 'content_ru', $this->content_ru])
            ->andFilterWhere(['like', 'content_en', $this->content_en])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'adress_uz', $this->adress_uz])
            ->andFilterWhere(['like', 'adress_ru', $this->adress_ru])
            ->andFilterWhere(['like', 'adress_en', $this->adress_en])
            ->andFilterWhere(['like', 'pic_main', $this->pic_main]);

        return $dataProvider;
    }

    public function formName() {
         return '';
    }
}
