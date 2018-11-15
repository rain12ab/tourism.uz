<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Hotels;
use yii\db\Expression;


class HotelWidget extends Widget
{
    public function run()
    {
        $hotels = Hotels::find()->orderBy(new Expression('rand()'))->limit(4)->all();
        return $this->render('hotel', [
            'hotels' => $hotels,
        ]);
    }

}
