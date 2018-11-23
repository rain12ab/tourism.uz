<?php
use yii\helpers\Url;

?>
<style type="text/css">
  @media screen and (max-width: 991px) {
    #other{
      padding-top: 15px;
    }
  }
</style>
<div class="col-lg-4 sidebar">
  <div class="sidebar-box ftco-animate">
    <h2><?= Yii::t('app', 'So\'nggi fotolavha');?></h2>
    <a href="<?= Url::to(['gallery/view', 'id' => $photo->id]);?>"><img style="width: 100%;" src="<?= Yii::$app->request->baseUrl;?>/<?= $photo->url;?>">
    <?php if(Yii::$app->language == 'uz')
            {
                $title = $photo->title_uz;
            }
        else if(Yii::$app->language == 'ru')
            {
                $title = $photo->title_ru;
            }
        else if(Yii::$app->language == 'en')
            {
                $title = $photo->title_en;
            }
        else
            {
                $title = null;
            }
    ?>
    <h4><?= $title;?></h4></a>
  </div>
  <div class="sidebar-box ftco-animate">
    <div class="categories">
      <h2><?= Yii::t('app', 'So\'nggi yangiliklar');?></h2>
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
        <li style="float: left;"><a href="<?= Url::to(['news/view', 'id' => $new->id]);?>"><img style="width: 35%; float: left; padding: 5px 0; margin: 10px; padding-left: 0; margin-left: 0;" src="<?= Yii::$app->request->baseUrl;?>/<?= $new->pic;?>"><p id="other"><?= $title;?></p></a></li>
      <?php endforeach?>
    </div>
  </div>
  <?php if(Yii::$app->language != 'en'):?>
  <div class="sidebar-box ftco-animate">
    <div class="categories">
      <h2><?= Yii::t('app', 'So\'nggi normativ-hujjatlar');?></h2>
      <?php foreach($laws as $law):?>
        <?php if(Yii::$app->language == 'uz')
                  {
                      $name = $law->name_uz;
                  }
              else if(Yii::$app->language == 'ru')
                  {
                      $name = $law->name_ru;
                  }
              else
                  {
                      $name = null;
                  }
                ?>
        <li><a href="<?= Url::to(['laws/view', 'id' => $law->id]);?>"><?= $name;?></a></li>
      <?php endforeach?>
    </div>
  </div>
  <?php endif?>
  <div class="sidebar-box ftco-animate">
    <div class="categories">
      <h2><?= Yii::t('app', 'Davlat manbalari');?></h2>
      <?php foreach($links as $link):?>
        <?php if(Yii::$app->language == 'uz')
                  {
                      $name = $link->name_uz;
                  }
              else if(Yii::$app->language == 'ru')
                  {
                      $name = $link->name_ru;
                  }
              else if(Yii::$app->language == 'en')
                  {
                      $name = $link->name_en;
                  }
              else
                  {
                      $name = null;
                  }
                ?>
        <li><a href="<?= Url::to($link->url);?>"><?= $name;?></a></li>
      <?php endforeach?>
    </div>
  </div>
</div>