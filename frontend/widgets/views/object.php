<?php

use yii\helpers\Url;

?>



<section class="ftco-section">
  <div class="container-fluid">
    <div class="row no-gutters justify-content-center mb-5 pb-5 ftco-animate">
      <div class="col-md-7 text-center heading-section">
        <h2><?= Yii::t('app', 'Eng mashhur joylar');?></h2>
      </div>
    </div>
    <div class="row no-gutters">
      <?php foreach($objects as $object):?>
      <?php if(Yii::$app->language == 'uz')
        {
          $name = $object->name_uz;
        }
        else if(Yii::$app->language == 'ru')
        {
          $name = $object->name_ru;
        }
        else if(Yii::$app->language == 'en')
        {
          $name = $object->name_en;
        }
        else
        {
          $name = null;
        }
      ?>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <a href="<?= Url::to(['objects/view', 'id' => $object->id]);?>" class="block-5" style="background-image: url('<?= Yii::$app->request->baseUrl;?>/<?= $object->pic1;?>');">
          <div class="text">
            <h3 class="heading"><?= $name;?></h3>
            <div class="post-meta">
              <span><?= Yii::t('app', 'Joylashgan joyi:');?><?= $object->district_id;?></span>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>