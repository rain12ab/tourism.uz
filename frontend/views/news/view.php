<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\widgets\DetailView;
use frontend\widgets\MessageWidget;
use frontend\widgets\RightSidebarWidget;

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

$this->title = StringHelper::truncate($title, 500);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yangiliklar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="margin: 20px auto;" class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-3"><?= $title;?></h1>
            <div style="margin-bottom: 20px;">
                <span style="padding: 1em; font-size: 1em;"><i class="fas fa-clock"></i> <?= Yii::t('app', 'Vaqti');?>: <?= $model->date;?></span>
                <span style="padding: 1em; font-size: 1em;"><i class="fas fa-user"></i> <?= Yii::t('app', 'Muallif');?>: <?= $model->author;?></span>
            </div>
            
            <div class="col">
                <img class="img-fluid" style="width: 100%; margin-bottom: 10px" src="<?= Yii::$app->request->baseUrl;?>/<?= $model->pic;?>">
                <?= $content;?>
            </div>
            <div class="tag-widget post-tag-container mb-5 mt-5">
                <?= \ymaker\social\share\widgets\SocialShare::widget([
                    'configurator'  => 'socialShare',
                    'url'           => \yii\helpers\Url::to('https://navoitourism.uz/news/view?id='.$model->id),
                    'title'         => $title,
                    'description'   => StringHelper::truncate($content, 100),
                    'imageUrl'      => Yii::$app->homeUrl.$model->pic,
                ]); ?>
                
            </div>
            <h3 class="mb-3" style="text-align: center; margin-top: 30px;"><?= Yii::t('app', 'Agarda sizda savollaring bo\'lsa, murojaat qiling');?></h3>
            <?= MessageWidget::widget();?>
        </div>
        <?= RightSidebarWidget::widget();?>
    </div>
</div>