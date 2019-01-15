

<section class="home-slider owl-carousel">
<?php foreach ($slider as $slide):?>
<?php if(Yii::$app->language == 'uz')
  {
    $title = $slide->title_uz;
  }
  else if(Yii::$app->language == 'ru')
  {
    $title = $slide->title_ru;
  }
  else if(Yii::$app->language == 'en')
  {
    $title = $slide->title_en;
  }
  else
  {
    $title = null;
  }
?>
  <div class="slider-item" style="background-image: url('<?= $slide->img;?>');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text align-items-center">
        <div class="col-md-7 col-sm-12 ftco-animate">
          <h1 style="font-family: 'Caveat', cursive;" class="mb-3"><?= $title;?></h1>
        </div>
      </div>
    </div>
  </div>
<?php endforeach?>
</section>
