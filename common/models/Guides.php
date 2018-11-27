<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%guides}}".
 *
 * @property int $id
 * @property string $full_name
 * @property string $languages
 * @property string $phone
 * @property string $email
 * @property string $pic
 */
class Guides extends \yii\db\ActiveRecord
{
    public $language_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%guides}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'languages', 'phone', 'email', 'pic'], 'required'],
            [['full_name', 'phone', 'email', 'pic'], 'string', 'max' => 300],
            [['languages'], 'string', 'max' => 500],
            [['language_id'], 'integer'],
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
            'languages' => Yii::t('app', 'Tillar'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'pic' => Yii::t('app', 'Pic'),
            'gid_name' => Yii::t('app', 'F.I.Sh'),
        ];
    }

    public function getLang() {
        return $this->hasMany(Country::className(), ['id' => 'language_id']);
    }
}
