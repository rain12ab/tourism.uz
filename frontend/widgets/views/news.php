<?php

use yii\helpers\Url;

?>



<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2><?= Yii::t('app', 'So\'nggi yangiliklar');?></h2>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="carousel1 owl-carousel ftco-owl">
        <?php foreach($news as $new):?>
        <?php if(Yii::$app->language == 'uz')
          {
            $title = $new->title_uz;
          }
          else if(Yii::$app->language == 'ru')
          {
            $title = $new->title_ru;
          }
          else if(Yii::$app->language == 'en')
          {
            $title = $new->title_en;
          }
          else
          {
            $title = null;
          }
        ?>
        <div class="item">
          <div class="blog-entry">
            <a href="<?= Url::to(['news/view', 'id' => $new->id]);?>" class="block-20" style="background-image: url('<?= Yii::$app->request->baseUrl;?>/<?= $new->pic;?>');">
            </a>
            <div class="text p-4">
              <div class="meta">
                <div><?= $new->date;?></div>
              </div>
              <h3 class="heading"><a href="<?= Url::to(['news/view', 'id' => $new->id]);?>"><?= $title;?></a></h3>
              <p class="clearfix">
                <a href="<?= Url::to(['news/view', 'id' => $new->id]);?>" class="float-left"><?= Yii::t('app', 'Batafsil');?></a>
              </p>
            </div>
          </div>
        </div>
        <?php endforeach?>
      </div>
    </div>
  </div>
</section>