<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "source_message".
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 *
 * @property Message[] $messages
 */
class SourceMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%source_message}}';
    }

    public $page_size;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'required'],
            [['message'], 'string'],
            [['message'], 'unique', 'message' => Yii::t('yii', '{attribute} value has already been taken.')],
            [['category'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'category' => Yii::t('yii', 'Category'),
            'message' => Yii::t('yii', 'Message'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['id' => 'id']);
    }

}
