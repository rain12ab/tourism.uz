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
            [['full_name_uz', 'full_name_ru', 'full_name_en', 'languages', 'phone', 'email', 'pic'], 'required'],
            [['full_name_uz', 'full_name_ru', 'full_name_en', 'phone', 'email', 'pic'], 'string', 'max' => 300],
            [['languages'], 'safe'],
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
            'full_name_uz' => Yii::t('app', 'F.I.Sh uz'),
            'full_name_ru' => Yii::t('app', 'F.I.Sh ru'),
            'full_name_en' => Yii::t('app', 'F.I.Sh en'),
            'languages' => Yii::t('app', 'Tillar'),
            'phone' => Yii::t('app', 'Tel.raqam'),
            'email' => Yii::t('app', 'Email'),
            'pic' => Yii::t('app', 'Rasm'),
            'gid_name' => Yii::t('app', 'F.I.Sh'),
        ];
    }

    public function getLang() {
        return $this->hasMany(Country::className(), ['id' => 'language_id']);
    }
}
