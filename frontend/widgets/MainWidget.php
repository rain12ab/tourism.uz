<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\News;

class MainWidget extends Widget
{
    public function run()
    {
        $news = News::find()->limit(2)->all();
        return $this->render('main', [
            'news' => $news,
        ]);

    }

}
