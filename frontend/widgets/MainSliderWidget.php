<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Slider;

class MainSliderWidget extends Widget
{
    public function run()
    {
        $slider = Slider::find()->all();
        return $this->render('main_slider', [
            'slider' => $slider,
        ]);
    }

}
