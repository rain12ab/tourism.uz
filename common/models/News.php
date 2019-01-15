<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int $id
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $content_uz
 * @property string $content_ru
 * @property string $content_en
 * @property string $pic
 * @property string $date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_uz', 'title_ru', 'title_en', 'content_uz', 'content_ru', 'content_en', 'date'], 'required'],
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['title_uz', 'title_ru', 'title_en', 'pic'], 'string', 'max' => 300],
            [['date'], 'string', 'max' => 200],
            [['author'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_uz' => Yii::t('app', 'Sarlavha Uz'),
            'title_ru' => Yii::t('app', 'Sarlavha Ru'),
            'title_en' => Yii::t('app', 'Sarlavha En'),
            'content_uz' => Yii::t('app', 'Kontent Uz'),
            'content_ru' => Yii::t('app', 'Kontent Ru'),
            'content_en' => Yii::t('app', 'Kontent En'),
            'pic' => Yii::t('app', 'Rasm'),
            'date' => Yii::t('app', 'Sanasi'),
            'author' => Yii::t('app', 'Muallif'),
        ];
    }
}
