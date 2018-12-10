<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%laws}}".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $url ссылка
 * @property int $lawtype_id тип закона
 */
class Laws extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%laws}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'url_uz', 'url_ru', 'lawtype_id', 'date'], 'required'],
            [['name_uz', 'name_ru', 'date'], 'string'],
            [['lawtype_id'], 'integer'],
            [['url_uz', 'url_ru'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Hujjat nomi'),
            'name_ru' => Yii::t('app', 'Название документа'),
            'url_uz' => Yii::t('app', 'E-manzil uz'),
            'url_ru' => Yii::t('app', 'E-manzil ru'),
            'lawtype_id' => Yii::t('app', 'Hujjat turi'),
            'date' => Yii::t('app', 'Sanasi'),
        ];
    }

    public function getType()
    {
        if(Yii::$app->language == 'uz')
          {
            $name = 'name_uz';
          }
        else if(Yii::$app->language == 'ru')
          {
            $name = 'name_ru';
          }
        else
        {
            $name = null;
        }
        
        $laws = Lawtype::find()->select(['id', $name])->asArray()->all();
        $count = Lawtype::find()->select(['id', $name])->count();
        for ($i=0; $i < $count; $i++) { 
            $laws[$i]['name'] = $laws[$i][$name];
            unset($laws[$i][$name]);
        }
        return $laws;
    }

    public function getName()
    {
        return $this->hasOne(Lawtype::className(), ['id' => 'lawtype_id']);
    }
}
