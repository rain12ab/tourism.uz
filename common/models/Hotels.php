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
    public $img_file;
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
            [['name_uz', 'name_ru', 'name_en', 'content_uz', 'content_ru', 'content_en', 'stars', 'lat', 'lng', 'phone', 'email', 'adress_uz', 'adress_ru', 'adress_en'], 'required'],
            [['content_uz', 'content_ru', 'content_en', 'pictures'], 'string'],
            [['stars', 'phone', 'district_id', 'hotel_type', 'price', 'price_tourist'], 'integer'],
            [['lat', 'lng'], 'double'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 500],
            [['email', 'adress_uz', 'adress_ru', 'adress_en', 'pic_main'], 'string', 'max' => 300],
            [['img_file'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Nomi uz'),
            'name_ru' => Yii::t('app', 'Nomi ru'),
            'name_en' => Yii::t('app', 'Nomi en'),
            'content_uz' => Yii::t('app', 'Kontent Uz'),
            'content_ru' => Yii::t('app', 'Kontent Ru'),
            'content_en' => Yii::t('app', 'Kontent En'),
            'stars' => Yii::t('app', 'Yulduz soni'),
            'lat' => Yii::t('app', 'Latitude (Kenglik)'),
            'lng' => Yii::t('app', 'Longitude (Uzunlik)'),
            'phone' => Yii::t('app', 'Tel.raqam'),
            'email' => Yii::t('app', 'Email'),
            'adress_uz' => Yii::t('app', 'Manzil Uz'),
            'adress_ru' => Yii::t('app', 'Manzil Ru'),
            'adress_en' => Yii::t('app', 'Manzil En'),
            'pic_main' => Yii::t('app', 'pic_main'),
            'hotel_name' => Yii::t('app', 'Mehmonxona nomi bo\'yicha qidirish'),
            'hotel_type' => Yii::t('app', 'Mehmonxona turi'),
            'district_id' => Yii::t('app', 'Joylashuvi'),
            'pic_main' => Yii::t('app', 'Asosiy rasm'),
            'pictures' => Yii::t('app', 'Galereya'),
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
        else if(Yii::$app->language == 'en')
          {
            $name = 'name_en';
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

    public function getListdistrict()
    {
        if(Yii::$app->language == 'uz')
          {
            $name = 'name_uz';
          }
        else if(Yii::$app->language == 'ru')
          {
            $name = 'name_ru';
          }
        else if(Yii::$app->language == 'en')
          {
            $name = 'name_en';
          }
        else
        {
            $name = null;
        }
        
        $district = Districts::find()->select(['id', $name])->asArray()->all();
        $count = Districts::find()->select(['id', $name])->count();
        for ($i=0; $i < $count; $i++) { 
            $district[$i]['name'] = $district[$i][$name];
            unset($district[$i][$name]);
        }
        return $district;
    }
}
