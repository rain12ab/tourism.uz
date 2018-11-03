<?php

use yii\helpers\Url;

?>

  <header role="banner" class="probootstrap-header">
    <div style="padding: 0 10px; margin: 0 10px;" class="container-fluid">
        <a href="<?= Yii::$app->homeUrl;?>"><img style="width: 150px;" src="<?= Yii::$app->homeUrl;?>images/l.png"></a>
        
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul style="margin-top: 50px;" class="probootstrap-main-nav">
            <li><a href="<?= Yii::$app->homeUrl;?>"><?= Yii::t('app', 'Bosh sahifa');?></a></li>
            <li><a href="<?= Url::to(['about/index']);?>"><?= Yii::t('app', 'Boshqarma haqida');?></a></li>
            <li><a href="<?= Url::to(['site/select']);?>"><?= Yii::t('app', 'Qonunchilik');?></a></li>
            <li><a href="<?= Url::to(['news/index']);?>"><?= Yii::t('app', 'Yangiliklar');?></a></li>
            <li><a href="<?= Url::to(['contacts/index']);?>"><?= Yii::t('app', 'Kontaktlar');?></a></li>
            <li><a href="<?= Url::to(['site/select']);?>"><?= Yii::t('app', 'Sayyohlarga');?></a></li>
          </ul>
          <div class="extra-text visible-xs"> 
            <?php foreach ($all as $one):?>
            <?php
            if(Yii::$app->language == 'uz')
              {
                $adress = $one->adress_uz;
              }
            else if(Yii::$app->language == 'ru')
              {
                $adress = $one->adress_ru;
              }
            else if(Yii::$app->language == 'en')
              {
                $adress = $one->adress_en;
              }
            else
              {
                $adress = null;
              }
            ?>
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
            <h5><?= Yii::t('app', 'Manzil');?></h5>
            <p><?= $adress;?></p>
            <ul class="social-buttons">
              <li><a href="<?= $one->facebook;?>"><i class="icon-facebook2"></i></a></li>
              <li><a href="<?= $one->instagram;?>"><i class="icon-instagram2"></i></a></li>
            </ul>
            <?php endforeach;?>
          </div>
        </nav>
    </div>
  </header>