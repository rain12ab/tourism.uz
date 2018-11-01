<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Messages;
use frontend\models\MessagesSearch;

class MessageWidget extends Widget
{
    public function run()
    {
        
        $model = new Messages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('message', [
            'model' => $model,
        ]);

    }

}
