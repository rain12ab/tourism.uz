<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
?>
<?php foreach($about as $a):?>
<?php if(Yii::$app->language == 'uz')
  {
    $content = $a->content_uz;
  }
  else if(Yii::$app->language == 'ru')
  {
    $content = $a->content_ru;
  }
  else if(Yii::$app->language == 'en')
  {
    $content = $a->content_en;
  }
  else
  {
    $content = null;
  }
?>

<style type="text/css">
  @media screen and (max-width: 991px) {
    .text-inner{
      margin-top: 80px;
    }
  }
</style>
<section class="ftco-section-2">
  <div class="container-fluid d-flex">
    <div class="section-2-blocks-wrapper row no-gutters">
      <div class="img col-sm-12 col-lg-6" style="background-image: url('<?= Yii::$app->request->baseUrl;?>/<?= $a->pic2;?>');">
        <?= Html::a('<span class="ion-ios-play"></span>', Yii::$app->homeUrl.$a->video, ['class' => 'button popup-vimeo popup-player', 'type' => 'video/mp4'])?>
      </div>
      <div class="text col-lg-6 ftco-animate">
        <div class="text-inner align-self-start">
         <?= $content;?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endforeach?>