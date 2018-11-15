<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Language;

class HeaderWidget extends Widget
{
    public function run()
    {
        $all = Language::find()->where(['status' => '1'])->orderBy('position DESC')->all();
        return $this->render('header', [
            'all' => $all,
        ]);

    }

}
