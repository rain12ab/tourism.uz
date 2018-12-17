<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%restaurants}}".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $content_uz
 * @property string $content_ru
 * @property string $content_en
 * @property string $phone
 * @property int $type
 * @property double $lat
 * @property double $lng
 * @property string $pic_main
 * @property array $pictures
 * @property int $district_id
 */
class Restaurants extends \yii\db\ActiveRecord
{
    public $img_file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%restaurants}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'content_uz', 'content_ru', 'content_en', 'phone', 'type', 'lat', 'lng', 'district_id'], 'required'],
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['adress_uz', 'adress_ru', 'adress_en'], 'string'],
            [['phone', 'type_id', 'district_id'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['pictures'], 'safe'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 500],
            [['pic_main'], 'string', 'max' => 300],
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
            'name_uz' => Yii::t('app', 'Nomi Uz'),
            'name_ru' => Yii::t('app', 'Nomi Ru'),
            'name_en' => Yii::t('app', 'Nomi En'),
            'content_uz' => Yii::t('app', 'Kontent Uz'),
            'content_ru' => Yii::t('app', 'Kontent Ru'),
            'content_en' => Yii::t('app', 'Kontent En'),
            'phone' => Yii::t('app', 'Tel.raqam'),
            'type' => Yii::t('app', 'Turi'),
            'lat' => Yii::t('app', 'Latitude (Kenglik)'),
            'lng' => Yii::t('app', 'Longitude (Uzunlik)'),
            'pic_main' => Yii::t('app', 'Asosiy rasm'),
            'pictures' => Yii::t('app', 'Galereya'),
            'district_id' => Yii::t('app', 'Joylashuvi'),
        ];
    }

    public function getDistrict() {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }

    public function getType() {
        return $this->hasOne(Restype::className(), ['id' => 'type_id']);
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
        
        $hotels = Restype::find()->select(['id', $name])->asArray()->all();
        $count = Restype::find()->select(['id', $name])->count();
        for ($i=0; $i < $count; $i++) { 
            $hotels[$i]['name'] = $hotels[$i][$name];
            unset($hotels[$i][$name]);
        }
        return $hotels;
    }
}
