<?php

use yii\helpers\Url;

?>



<section class="ftco-section">
  <div style="margin-bottom: 40px;" class="text-center heading-section">
      <h2><?= Yii::t('app', 'Mehmonxonalar');?></h2>
  </div>
  <div class="container">
    <div class="row">
      <?php foreach($hotels as $hotel):?>
      <?php if(Yii::$app->language == 'uz')
        {
          $name = $hotel->name_uz;
          $district = $model->district->name_uz;
        }
      else if(Yii::$app->language == 'ru')
        {
          $name = $hotel->name_ru;
          $district = $model->district->name_ru;
        }
      else if(Yii::$app->language == 'en')
        {
          $name = $hotel->name_en;
          $district = $model->district->name_en;
        }
      else
        {
          $name = null;
          $district = null;
        }
      $result = Yii::$app->runAction('hotels/calculate', ['sum' => $hotel->price]);
      ?>
      <div class="col-lg-3 promo ftco-animate">
        <a href="<?= Url::to(['hotels/view', 'id' => $hotel->id]);?>" class="promo-img mb-4" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/<?= $hotel->pic_main;?>);"></a>
        <div class="text text-center">
          <h2><?= $name;?></h2>
          <span style="font-size: 14px;" class="price"><?= round($result[0], 2).'$/'.Yii::t('app', 'bir kecha');?></span>
          <br>
          <span style="font-size: 14px;" class="price"><?= round($result[1], 2).'€/'.Yii::t('app', 'bir kecha');?></span>
          <br>
          <span style="font-size: 14px;" class="price"><?= $hotel->price.' '.Yii::t('app', 'so\'m').'/'.Yii::t('app', 'bir kecha');?></span><br>
          <?php for ($i=0; $i < $hotel->stars; $i++): ?>
            <span><i style="color: yellow;" class="fas fa-star"></i></span>
          <?php endfor?><br>
          <a href="<?= Url::to(['hotels/view', 'id' => $hotel->id]);?>" class="read"><?= Yii::t('app', 'Batafsil');?></a>
        </div>
      </div>
    <?php endforeach?>
    </div>
  </div>
</section>
