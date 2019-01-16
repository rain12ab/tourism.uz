<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "option".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $status
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%option}}';
    }

    public $site_url;
    public $site_admin_email;
    public $site_admin_tel;
    public $membership;
    public $default_role;
    public $site_container;
    public $site_sidebar;
    public $site_timezone;
    public $site_date;
    public $site_language;
    public $default_post_category;
    public $show_post;
    public $default_allow_comment;
    public $default_allow_meta;

    public function rules()
    {
        return [

            [['name', 'value'], 'required'],
            [['site_url', 'site_admin_email', 'membership', 'default_role', 'site_container',
              'site_sidebar', 'site_timezone', 'site_date', 'site_language', 'site_admin_tel','default_post_category',
              'show_post', 'default_allow_comment', 'default_allow_meta'],'required', 'on'=>'start' ],
            [['site_url'], 'url'],
            [['site_admin_email'], 'email'],
            [['membership', 'default_role', 'default_post_category','show_post',
              'default_allow_comment', 'default_allow_meta'], 'integer'],
            [['value', 'status', 'site_container', 'site_sidebar', 'site_timezone','site_admin_tel',
              'site_date', 'site_language', ], 'string'],
            [['name'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'name' => Yii::t('yii', 'Name'),
            'value' => Yii::t('yii', 'Value'),
            'status' => Yii::t('yii', 'Status'),
            'membership' => Yii::t('yii', 'Anyone can register'),
        ];
    }
}
