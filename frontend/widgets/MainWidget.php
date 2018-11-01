<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;

class MainWidget extends Widget
{
    public function run()
    {
        
        return $this->render('main');

    }

}
