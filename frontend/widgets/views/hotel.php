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
      <div class="col-lg-3 promo ftco-animate">
        <a href="<?= Url::to(['hotels/view', 'id' => $hotel->id]);?>" class="promo-img mb-4" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/<?= $hotel->pic1;?>);"></a>
        <div class="text text-center">
          <h2><?= $hotel->name;?></h2>
          <?php for ($i=0; $i < $hotel->stars; $i++) { ?>
            <span><i style="color: yellow;" class="fas fa-star"></i></span>
          <?php }?><br>
          <a href="<?= Url::to(['hotels/view', 'id' => $hotel->id]);?>" class="read"><?= Yii::t('app', 'Batafsil');?></a>
        </div>
      </div>
    <?php endforeach?>
    </div>
  </div>
</section>