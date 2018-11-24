<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%restype}}".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_rn
 */
class Restype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%restype}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'name_rn'], 'required'],
            [['name_uz', 'name_ru', 'name_rn'], 'string', 'max' => 500],
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
            'name_rn' => Yii::t('app', 'Name Rn'),
        ];
    }
}
