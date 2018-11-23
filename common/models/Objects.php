<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%objects}}".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $content_uz
 * @property string $content_ru
 * @property string $content_en
 * @property string $pic1
 * @property string $pic2
 * @property string $pic3
 * @property string $pic4
 * @property double $lat
 * @property double $lng
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%objects}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'content_uz', 'content_ru', 'content_en', 'pic1', 'pic2', 'pic3', 'pic4', 'lat', 'lng'], 'required'],
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['lat', 'lng'], 'number'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 500],
            [['pic1', 'pic2', 'pic3', 'pic4'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Joy nomi bo\'yicha qidirish'),
            'name_ru' => Yii::t('app', 'Поиск по названию места'),
            'name_en' => Yii::t('app', 'Search by name of place'),
            'content_uz' => Yii::t('app', 'Content Uz'),
            'content_ru' => Yii::t('app', 'Content Ru'),
            'content_en' => Yii::t('app', 'Content En'),
            'pic1' => Yii::t('app', 'Pic1'),
            'pic2' => Yii::t('app', 'Pic2'),
            'pic3' => Yii::t('app', 'Pic3'),
            'pic4' => Yii::t('app', 'Pic4'),
            'lat' => Yii::t('app', 'Lat'),
            'lng' => Yii::t('app', 'Lng'),
        ];
    }

    public function getDistrict() {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }
}
