<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $language
 * @property string $translation
 *
 * @property SourceMessage $id0
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    public $page_size;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'language'], 'required'],
            [['id', 'language'], 'unique',
                'when'=>function($model){
                    $id = $model->id;
                    $language = $model->language;
                    $a = Message::findOne(['id'=>$id,'language'=>$language]);
                    if($a==null) {return false; }else{return true; }
                },'enableClientValidation'=>false,'message' => Yii::t('yii', 'Message has already been translate this language.')
            ,'on'=>'create'],
            [['id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'language' => Yii::t('yii', 'Language'),
            'translation' => Yii::t('yii', 'Translation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(SourceMessage::className(), ['id' => 'id']);
    }
}
