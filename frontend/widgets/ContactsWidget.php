<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Contacts;

class ContactsWidget extends Widget
{
    public function run()
    {
        $all = Contacts::find()->where(['id' => 1])->all();
        return $this->render('contacts', [
            'all' => $all,
        ]);
    }

}
