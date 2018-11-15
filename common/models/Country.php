<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%country}}".
 *
 * @property int $id
 * @property string $iso ISO
 * @property string $language_code Language Code
 * @property string $name Name
 * @property string $nice_name Nice Name
 * @property string $iso3 ISO3
 * @property int $num_code Number Code
 * @property int $phone_code Phone Code
 * @property int $position Position
 * @property string $status
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%country}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iso', 'name', 'nice_name', 'phone_code'], 'required'],
            [['name', 'nice_name', 'status'], 'string'],
            [['num_code', 'phone_code', 'position'], 'integer'],
            [['iso'], 'string', 'max' => 2],
            [['language_code'], 'string', 'max' => 10],
            [['iso3'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'iso' => Yii::t('app', 'Iso'),
            'language_code' => Yii::t('app', 'Language Code'),
            'name' => Yii::t('app', 'Name'),
            'nice_name' => Yii::t('app', 'Nice Name'),
            'iso3' => Yii::t('app', 'Iso3'),
            'num_code' => Yii::t('app', 'Num Code'),
            'phone_code' => Yii::t('app', 'Phone Code'),
            'position' => Yii::t('app', 'Position'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
