<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%hotels}}".
 *
 * @property int $id
 * @property string $name
 * @property string $content_uz
 * @property string $content_ru
 * @property string $content_en
 * @property int $stars
 * @property double $lat
 * @property double $lng
 * @property int $phone
 * @property string $email
 * @property string $adress_uz
 * @property string $adress_ru
 * @property string $adress_en
 * @property string $pic1
 * @property string $pic2
 * @property string $pic3
 * @property string $pic4
 */
class Hotels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%hotels}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content_uz', 'content_ru', 'content_en', 'stars', 'lat', 'lng', 'phone', 'email', 'adress_uz', 'adress_ru', 'adress_en', 'pic_main'], 'required'],
            [['content_uz', 'content_ru', 'content_en', 'pictures'], 'string'],
            [['stars', 'phone'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['name'], 'string', 'max' => 500],
            [['email', 'adress_uz', 'adress_ru', 'adress_en', 'pic_main'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'content_uz' => Yii::t('app', 'Content Uz'),
            'content_ru' => Yii::t('app', 'Content Ru'),
            'content_en' => Yii::t('app', 'Content En'),
            'stars' => Yii::t('app', 'Stars'),
            'lat' => Yii::t('app', 'Lat'),
            'lng' => Yii::t('app', 'Lng'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'adress_uz' => Yii::t('app', 'Adress Uz'),
            'adress_ru' => Yii::t('app', 'Adress Ru'),
            'adress_en' => Yii::t('app', 'Adress En'),
            'pic_main' => Yii::t('app', 'pic_main'),
            'hotel_name' => Yii::t('app', 'Mehmonxona nomi bo\'yicha qidirish'),
            'hotel_type' => Yii::t('app', 'Mehmonxona turi'),
        ];
    }

    public function getDistrict() {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }

    public function getType() {
        return $this->hasOne(Hoteltype::className(), ['id' => 'hotel_type']);
    }

    public function getList()
    {
        if(Yii::$app->language == 'uz')
          {
            $name = 'name_uz';
          }
        else if(Yii::$app->language == 'ru')
          {
            $name = 'name_ru';
          }
        else
        {
            $name = null;
        }
        
        $hotels = Hoteltype::find()->select(['id', $name])->asArray()->all();
        $count = Hoteltype::find()->select(['id', $name])->count();
        for ($i=0; $i < $count; $i++) { 
            $hotels[$i]['name'] = $hotels[$i][$name];
            unset($hotels[$i][$name]);
        }
        return $hotels;
    }
}
