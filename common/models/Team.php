<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%team}}".
 *
 * @property int $id
 * @property string $full_name_uz
 * @property string $full_name_ru
 * @property string $full_name_en
 * @property string $post_uz
 * @property string $post_ru
 * @property string $post_en
 * @property string $pic
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%team}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name_uz', 'full_name_ru', 'full_name_en', 'post_uz', 'post_ru', 'post_en', 'pic'], 'required'],
            [['full_name_uz', 'full_name_ru', 'full_name_en', 'post_uz', 'post_ru', 'post_en', 'pic'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name_uz' => Yii::t('app', 'FISH Uz'),
            'full_name_ru' => Yii::t('app', 'FISH Ru'),
            'full_name_en' => Yii::t('app', 'FISH En'),
            'post_uz' => Yii::t('app', 'Lavozim Uz'),
            'post_ru' => Yii::t('app', 'Lavozim Ru'),
            'post_en' => Yii::t('app', 'Lavozim En'),
            'pic' => Yii::t('app', 'Rasm'),
        ];
    }
}
