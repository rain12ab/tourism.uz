<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\About;
use kato\VideojsWidget;

class AboutWidget extends Widget
{
    public function run()
    {
        $about = About::find()->where(['id' => 1])->all();
        return $this->render('about', [
            'about' => $about,
        ]);
    }
}
