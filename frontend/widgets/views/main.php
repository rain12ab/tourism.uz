<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;

?>

<style type="text/css">
.img-bg{
  -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
  -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
  box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
}
.probootstrap-photo-details{
  background-color: #00000080;
    padding: 10px;
}
.vdivide [class*='col-sm']:not(:last-child):after {
  background: #e0e0e0;
  width: 3px;
  content: "";
  display:block;
  position: absolute;
  top:0;
  bottom: 0;
  right: 0;
  min-height: 70px;
}
</style>

  <div class="probootstrap-section">
    <div class="container">
      <div style="margin-bottom: 50px;" class="row vdivide probootstrap-gutter16">
        <div class="col-md-12">
          <div id="news" class="col-sm-7">
            <h2 style="margin-bottom: 40px; text-align: center;"><?= Yii::t('app', 'So\'nggi yangiliklar');?></h2>
            <?php foreach ($news as $new):?>
            <?php
              if(Yii::$app->language == 'uz')
                {
                  $title = $new->title_uz;
                  $content = $new->content_uz;
                }
              else if(Yii::$app->language == 'ru')
                {
                  $title = $new->title_ru;
                  $content = $new->content_ru;
                }
              else if(Yii::$app->language == 'en')
                {
                  $title = $new->title_en;
                  $content = $new->content_en;
                }
              else
                {
                  $title = null;
                  $content = null;
                }
            ?>
            <div class="row">
              <div class="col-md-4">
                <img style="width: 100%; margin-bottom: 20px;" src="<?= Yii::$app->request->baseUrl;?>/<?= $new->pic;?>">
              </div>
              <div class="col-md-8">
                <h4 style="margin-top: -0.5em"><a href="<?= Url::to(['news/view', 'id' => $new->id]);?>"><?= $title;?></a></h4>
                <p><?= StringHelper::truncate($content, 200);?></p>
              </div>
            </div>
            <?php endforeach;?>
            <?= Html::a(Yii::t('app', 'Barcha yangiliklar'), ['/news/index'], ['class'=>'btn btn-primary btn-sm col-md-5 col-md-offset-3']) ?>
          </div>
          <div id="law" class="col-sm-4 col-md-offset-1">
            <h2 style="text-align: center; margin-bottom: 40px;"><?= Yii::t('app', 'Yangi normativ-huquqiy hujjatlar');?></h2>
            <?php foreach ($laws as $law):?>
            <?php
              if(Yii::$app->language == 'uz')
                {
                  $name = $law->name_uz;
                  $url = $law->url_uz;
                }
              else if(Yii::$app->language == 'ru')
                {
                  $name = $law->name_ru;
                  $url = $law->url_ru;
                }
              else
                {
                  $name = null;
                  $url = null;
                }
            ?>
            <div style="margin-bottom: 15px;" class="row">
              <?= Html::a($name, $url) ?>
            </div>
            <?php endforeach;?>
            <?= Html::a(Yii::t('app', 'Barcha normativ-huquqiy hujjatlar'), ['/news/index'], ['class'=>'btn btn-primary btn-sm col-md-12']) ?>
          </div>
        </div>
      </div>
      <div id="selector" class="row probootstrap-gutter16">
        <div class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
          <a href="<?= Url::to(['objects/index']);?>" class="img-bg" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/images/bg/6.jpg);">
            <div class="probootstrap-photo-details">
              <h2><?= Yii::t('app', 'Turistik obyektlar');?></h2>
              <p><?= Yii::t('app', 'Arxitekturik, arxeologik va tabiat joylar');?></p>
            </div>
          </a>
        </div>
        <div class="col-md-8 probootstrap-animate" data-animate-effect="fadeIn">
          <a href="<?= Url::to(['hotels/index']);?>" class="img-bg" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/images/bg/2.jpg);">
            <div class="probootstrap-photo-details">
              <h2><?= Yii::t('app', 'Mehmonxonalar');?></h2>
              <p><?= Yii::t('app', 'Motellar, uymehmonxonalari v.h.k.');?></p>
            </div>
          </a>
        </div>
      </div>

      <div class="row probootstrap-gutter16">
        <div class="col-md-5 probootstrap-animate" data-animate-effect="fadeIn">
          <a href="<?= Url::to(['restaurants/index']);?>" class="img-bg" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/images/bg/3.jpg);">
            <div class="probootstrap-photo-details">
              <h2><?= Yii::t('app', 'Ovqatlanish maskanlari');?></h2>
              <p><?= Yii::t('app', 'Choyxonlar, restoranlar, kafe v.h.k.');?></p>
            </div>
          </a>
        </div>
        <div class="col-md-7 probootstrap-animate" data-animate-effect="fadeIn">
          <a href="<?= Url::to(['gallery/index']);?>" class="img-bg" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/images/bg/5.jpg);">
            <div class="probootstrap-photo-details">
              <h2><?= Yii::t('app', 'Gallereya');?></h2>
              <p><?= Yii::t('app', 'Navoiy viloyatidan fotolovhalar');?></p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>