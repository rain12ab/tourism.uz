<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\News;
use common\models\Laws;

class MainWidget extends Widget
{
    public function run()
    {
        $news = News::find()->limit(2)->all();
        $laws = Laws::find()->limit(3)->all();
        return $this->render('main', [
            'news' => $news,
            'laws' => $laws,
        ]);
    }

}
