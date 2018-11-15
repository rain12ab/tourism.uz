<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Objects;
use yii\db\Expression;

class ObjectWidget extends Widget
{
    public function run()
    {
        $objects = Objects::find()->where(['popular' => 1])->orderBy(new Expression('rand()'))->limit(8)->all();
        return $this->render('object', [
            'objects' => $objects,
        ]);
    }

}
