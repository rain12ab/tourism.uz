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
 * @property string $pictures
 * @property string $pic2
 * @property string $pic3
 * @property string $pic4
 * @property double $lat
 * @property double $lng
 */
class Objects extends \yii\db\ActiveRecord
{
    public $img_file;
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
            [['name_uz', 'name_ru', 'name_en', 'content_uz', 'content_ru', 'content_en', 'lat', 'lng'], 'required'],
            [['content_uz', 'content_ru', 'content_en', 'pictures'], 'string'],
            [['lat', 'lng'], 'number'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 500],
            [['pic_main'], 'string', 'max' => 300],
            [['popular', 'district_id'], 'integer'],
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
            'name_uz_2' => Yii::t('app', 'Joy nomi bo\'yicha qidirish'),
            'name_ru_2' => Yii::t('app', 'Поиск по названию места'),
            'name_en_2' => Yii::t('app', 'Search by name of place'),
            'name_uz' => Yii::t('app', 'Nomi Uz'),
            'name_ru' => Yii::t('app', 'Nomi Ru'),
            'name_en' => Yii::t('app', 'Nomi En'),
            'content_uz' => Yii::t('app', 'Kontent Uz'),
            'content_ru' => Yii::t('app', 'Kontent Ru'),
            'content_en' => Yii::t('app', 'Kontent En'),
            'pictures' => Yii::t('app', 'Galereya'),
            'pic_main' => Yii::t('app', 'Asosiy rasm'),
            'lat' => Yii::t('app', 'Latitude (Kenglik)'),
            'lng' => Yii::t('app', 'Longitude (Uzunlik)'),
            'popular' => Yii::t('app', 'Mashhurligi'),
        ];
    }

    public function getDistrict() {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }
}
