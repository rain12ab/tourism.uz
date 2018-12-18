<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%reception}}".
 *
 * @property int $id
 * @property string $full_name
 * @property string $message
 * @property string $file
 * @property string $title
 * @property string $organization
 * @property string $phone
 * @property string $email
 * @property string $passport
 * @property int $type
 * @property int $datetime
 * @property string $unique_number
 * @property int $status
 */
class Reception extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%reception}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'full_name', 'message', 'file', 'title', 'organization', 'phone', 'email', 'passport', 'type', 'datetime', 'unique_number', 'status'], 'required'],
            [['id', 'type', 'datetime', 'status'], 'integer'],
            [['message'], 'string'],
            [['full_name', 'file', 'title', 'organization', 'phone', 'email', 'passport'], 'string', 'max' => 500],
            [['unique_number'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'F.I.Sh'),
            'message' => Yii::t('app', 'Xabar'),
            'file' => Yii::t('app', 'Fayl'),
            'title' => Yii::t('app', 'Sarlavha'),
            'organization' => Yii::t('app', 'Tashkilot'),
            'phone' => Yii::t('app', 'Tel.raqam'),
            'email' => Yii::t('app', 'Email'),
            'passport' => Yii::t('app', 'Pasport'),
            'type' => Yii::t('app', 'Turi'),
            'datetime' => Yii::t('app', 'Vaqti'),
            'unique_number' => Yii::t('app', 'Individual raqami'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
