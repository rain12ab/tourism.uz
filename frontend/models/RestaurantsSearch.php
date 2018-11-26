<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Restaurants;

/**
 * RestaurantsSearch represents the model behind the search form of `common\models\Restaurants`.
 */
class RestaurantsSearch extends Restaurants
{
    public $res_name;
    public $type;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phone', 'type_id', 'district_id', 'type'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'content_uz', 'content_ru', 'content_en', 'pic_main', 'pictures', 'res_name'], 'safe'],
            [['lat', 'lng',], 'number'],
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
        $query = Restaurants::find();

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
            'phone' => $this->phone,
            'type_id' => $this->type,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'district_id' => $this->district_id,
        ]);

        if(Yii::$app->language == 'uz')
            {
                $query->andFilterWhere(['like', 'name_uz', $this->res_name]);
            }
        else if(Yii::$app->language == 'ru')
            {
                $query->andFilterWhere(['like', 'name_ru', $this->res_name]);
            }
        else if(Yii::$app->language == 'en')
            {
                $query->andFilterWhere(['like', 'name_en', $this->res_name]);
            }
        else
            {
                $query = null;
            }

        $query->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'content_uz', $this->content_uz])
            ->andFilterWhere(['like', 'content_ru', $this->content_ru])
            ->andFilterWhere(['like', 'content_en', $this->content_en])
            ->andFilterWhere(['like', 'pic_main', $this->pic_main])
            ->andFilterWhere(['like', 'pictures', $this->pictures]);

        return $dataProvider;
    }

    public function formName() {
         return '';
    }
}
