<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AboutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Boshqarma haqida');
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .mb-3 {
        font-size: 30px;
        font-weight:bold;
    }
</style>
<section class="ftco-section">
    <div class="container">
        <div class="col-md-12">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_about',
                'summary' => '',
            ]) ?>
        </div>
    </div>
</section>
<section class="ftco-section">
    <h1 class="mb-3" style="text-align: center; margin-top: 50px;"><?= Yii::t('app', 'Boshqarma hodimlari');?></h1>
    <div class="container">
        <div class="row">
            <?php foreach($teams as $team):?>
            <?php if(Yii::$app->language == 'uz')
              {
                $full_name = $team->full_name_uz;
                $post = $team->post_uz;
              }
            else if(Yii::$app->language == 'ru')
              {
                $full_name = $team->full_name_ru;
                $post = $team->post_ru;
              }
            else if(Yii::$app->language == 'en')
              {
                $full_name = $team->full_name_en;
                $post = $team->post_en;
              }
            else
              {
                $full_name = null;
                $post = null;
              }

            ?>
            <style type="text/css">
                .promo .promo-img {
                    /*display: block;*/
                    /*height: 150px;*/
                    /*width: 150px;*/
                }
            </style>
            <div style="margin-top: 30px;" class="col-lg-3 promo ftco-animate">
                <a href="#" class="promo-img mb-4" style="background-image: url(<?= Yii::$app->homeUrl.$team->pic;?>"></a>
                <div class="text text-center">
                    <h2><?= $full_name;?></h2>
                    <h3><?= $post;?></h3>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="col-md-12">
            <?= ListView::widget([
                'dataProvider' => $dataProvider2,
                'itemView' => '_contact',
                'summary' => '',
            ]) ?>
        </div>
    </div>
</section>
