<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%links}}".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $url
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%links}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_en', 'url'], 'required'],
            [['name_uz', 'name_ru', 'name_en', 'url'], 'string', 'max' => 500],
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
            'url' => Yii::t('app', 'Url'),
        ];
    }
}
