<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%messages}}".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $content
 * @property string $date
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%messages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'content', 'date'], 'required'],
            [['content'], 'string'],
            [['name', 'date'], 'string', 'max' => 300],
            [['phone', 'email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'F.I.Sh.'),
            'phone' => Yii::t('app', 'Telefon raqam'),
            'email' => Yii::t('app', 'E-mail'),
            'content' => Yii::t('app', 'Xabar'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}
