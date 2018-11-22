<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%symbols}}".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $content_uz
 * @property string $content_ru
 * @property string $content_en
 * @property string $file
 */
class Symbols extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%symbols}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'content_uz', 'content_ru', 'content_en', 'file'], 'required'],
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['name_uz', 'name_ru', 'name_en'], 'string', 'max' => 300],
            [['file'], 'string', 'max' => 500],
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
            'file' => Yii::t('app', 'File'),
        ];
    }
}
