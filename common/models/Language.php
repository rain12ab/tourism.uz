<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%language}}".
 *
 * @property int $id
 * @property string $name Name
 * @property int $language_code_id Language Code
 * @property int $position Position
 * @property string $status Status
 * @property string $created_at Created Time
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%language}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'language_code_id'], 'required'],
            [['name', 'status'], 'string'],
            [['language_code_id', 'position'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'language_code_id' => Yii::t('app', 'Language Code ID'),
            'position' => Yii::t('app', 'Position'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
    public function getLangname() {
        return $this->hasOne(Country::className(), ['id' => 'language_code_id']);
    }
}
