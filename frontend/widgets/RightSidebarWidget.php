<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\News;
use common\models\Laws;
use common\models\Gallery;
use common\models\Links;


class RightSidebarWidget extends Widget
{
    public function run()
    {
    	$laws = Laws::find()->limit(3)->orderBy('id DESC')->all();
        $news = News::find()->limit(3)->orderBy('id DESC')->all();
        $links = Links::find()->limit(4)->all();
        $photo = Gallery::find()->orderBy('id DESC')->one();

        return $this->render('right', [
            'news' => $news,
            'laws' => $laws,
            'photo' => $photo,
            'links' => $links,
        ]);
    }

}
