<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%currency}}".
 *
 * @property int $id
 * @property int $value
 * @property string $date
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%currency}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id', 'value', 'date'], 'required'],
            [['id', 'dollar', 'euro'], 'integer'],
            [['date'], 'string', 'max' => 300],
            [['date','value'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'value' => Yii::t('app', 'Value'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}
