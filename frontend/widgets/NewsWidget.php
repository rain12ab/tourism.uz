<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\News;

class NewsWidget extends Widget
{
    public function run()
    {
        $news = News::find()->limit(6)->orderBy('id DESC')->all();
        return $this->render('news', [
            'news' => $news,
        ]);
    }

}
