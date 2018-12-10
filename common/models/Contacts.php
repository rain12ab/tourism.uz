<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%contacts}}".
 *
 * @property int $id
 * @property string $email
 * @property int $phone
 * @property string $telegram
 * @property string $facebook
 * @property string $instagram
 * @property string $adress_uz
 * @property string $adress_ru
 * @property string $adress_en
 * @property double $lat
 * @property double $lng
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contacts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'telegram', 'facebook', 'instagram', 'adress_uz', 'adress_ru', 'adress_en', 'lat', 'lng'], 'required'],
            [['lat', 'lng'], 'number'],
            [['phone', 'telegram', 'facebook', 'instagram', 'adress_uz', 'adress_ru', 'adress_en'], 'string', 'max' => 300],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Telefon raqam'),
            'telegram' => Yii::t('app', 'Telegram'),
            'facebook' => Yii::t('app', 'Facebook'),
            'instagram' => Yii::t('app', 'Instagram'),
            'adress_uz' => Yii::t('app', 'Manzil Uz'),
            'adress_ru' => Yii::t('app', 'Manzil Ru'),
            'adress_en' => Yii::t('app', 'Manzil En'),
            'lat' => Yii::t('app', 'Latitude (Kenglik)'),
            'lng' => Yii::t('app', 'Longitude (Uzunlik)'),
        ];
    }
}
