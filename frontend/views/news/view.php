<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\widgets\MessageWidget;

/* @var $this yii\web\View */
/* @var $model common\models\News */
if(Yii::$app->language == 'uz')
    {
        $title = $model->title_uz;
        $content = $model->content_uz;
    }
else if(Yii::$app->language == 'ru')
    {
        $title = $model->title_ru;
        $content = $model->content_ru;
    }
else if(Yii::$app->language == 'en')
    {
        $title = $model->title_en;
        $content = $model->content_en;
    }
else
    {
        $title = null;
        $content = null;
    }

$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yangiliklar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="probootstrap-section">
    <div class="container">
        <div class="col-md-12">
            <h1 class="mt0"><?= $title;?></h1>
            <ul style="margin-bottom: -12px;" class="with-icon colored"><li><i class="fas fa-clock"></i><span style="font-size: 14px;"><?= $model->date;?></span></li></ul>
            <img class="img-border" style="width: 100%; margin-bottom: 10px" src="<?= Yii::$app->request->baseUrl;?>/<?= $model->pic;?>">
            <div class="row">
                <p>
                    <?= $content;?>
                </p>
                <?= MessageWidget::widget();?>
            </div>
        </div>
    </div>
</div>