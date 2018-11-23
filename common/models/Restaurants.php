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
            [['name_uz', 'name_ru', 'name_en', 'content_uz', 'content_ru', 'content_en', 'phone', 'type', 'lat', 'lng', 'pic_main', 'pictures', 'district_id'], 'required'],
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['phone', 'type', 'district_id'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['pictures'], 'safe'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 500],
            [['pic_main'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_en' => Yii::t('app', 'Name En'),
            'content_uz' => Yii::t('app', 'Content Uz'),
            'content_ru' => Yii::t('app', 'Content Ru'),
            'content_en' => Yii::t('app', 'Content En'),
            'phone' => Yii::t('app', 'Phone'),
            'type' => Yii::t('app', 'Type'),
            'lat' => Yii::t('app', 'Lat'),
            'lng' => Yii::t('app', 'Lng'),
            'pic_main' => Yii::t('app', 'Pic Main'),
            'pictures' => Yii::t('app', 'Pictures'),
            'district_id' => Yii::t('app', 'District ID'),
        ];
    }

    public function getDistrict() {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }
}
