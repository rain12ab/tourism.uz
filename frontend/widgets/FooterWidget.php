<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Contacts;
use common\models\Links;

class FooterWidget extends Widget
{
    public function run()
    {
        $contacts = Contacts::find()->where(['id' => 1])->all();
        $links = Links::find()->where(['id' => 1])->all();
        return $this->render('footer', [
            'contacts' => $contacts,
            'links' => $links,
        ]);
    }

}
