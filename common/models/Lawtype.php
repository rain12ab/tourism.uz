<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lawtype}}".
 *
 * @property int $id
 * @property int $name_uz
 * @property int $name_ru
 */
class Lawtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lawtype}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name_uz', 'name_ru'], 'required'],
            [['id', 'name_uz', 'name_ru'], 'integer'],
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
        ];
    }
}
