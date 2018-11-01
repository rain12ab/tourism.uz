<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%about}}".
 *
 * @property int $id
 * @property string $content_uz
 * @property string $content_ru
 * @property string $content_en
 * @property string $pic1
 * @property string $pic2
 * @property string $pic3
 * @property string $pic4
 * @property string $pic5
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%about}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_uz', 'content_ru', 'content_en', 'pic1', 'pic2', 'pic3', 'pic4', 'pic5'], 'required'],
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['pic1', 'pic2', 'pic3', 'pic4', 'pic5'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content_uz' => Yii::t('app', 'Content Uz'),
            'content_ru' => Yii::t('app', 'Content Ru'),
            'content_en' => Yii::t('app', 'Content En'),
            'pic1' => Yii::t('app', 'Pic1'),
            'pic2' => Yii::t('app', 'Pic2'),
            'pic3' => Yii::t('app', 'Pic3'),
            'pic4' => Yii::t('app', 'Pic4'),
            'pic5' => Yii::t('app', 'Pic5'),
        ];
    }
}
