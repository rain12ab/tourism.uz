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
            'full_name' => Yii::t('app', 'Full Name'),
            'message' => Yii::t('app', 'Message'),
            'file' => Yii::t('app', 'File'),
            'title' => Yii::t('app', 'Title'),
            'organization' => Yii::t('app', 'Organization'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'passport' => Yii::t('app', 'Passport'),
            'type' => Yii::t('app', 'Type'),
            'datetime' => Yii::t('app', 'Datetime'),
            'unique_number' => Yii::t('app', 'Unique Number'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
