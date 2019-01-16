<?php

use yii\helpers\Url;

?>


<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <img style="width: 100%" src="<?= Yii::$app->request->baseUrl;?>/images/logo_white.png">
              <p><?= Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');?></p>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><?= Yii::t('app', 'Bo\'limlar');?></h2>
              <ul class="list-unstyled">
                <li><a href="<?= Yii::$app->homeUrl;?>"><?= Yii::t('app', 'Bosh sahifa');?></a></li>
                <li><a href="<?= Url::to(['about/index']);?>"><?= Yii::t('app', 'Boshqarma haqida');?></a></li>
                <li><a href="<?= Url::to(['laws/index']);?>"><?= Yii::t('app', 'Qonunchilik');?></a></li>
                <li><a href="<?= Url::to(['news/index']);?>"><?= Yii::t('app', 'Yangiliklar');?></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><?= Yii::t('app', 'Davlat manbalari');?></h2>
              <ul class="list-unstyled">
                <?php foreach ($links as $link):?>
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
                <li><a target="_blank" href="<?= $link->url;?>" class="py-2 d-block"><?= $name;?></a></li>
                <?php endforeach?>
              </ul>
            </div>
          </div>
          <?php foreach ($contacts as $contact):?>
          <?php if(Yii::$app->language == 'uz')
            {
              $adress = $contact->adress_uz;
            }
            else if(Yii::$app->language == 'ru')
            {
              $adress = $contact->adress_ru;
            }
            else if(Yii::$app->language == 'en')
            {
              $adress = $contact->adress_en;
            }
            else
            {
              $adress = null;
            }
          ?>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><?= Yii::t('app', 'Aloqa ma\'lumotlari');?></h2>
              <ul class="list-unstyled">
                <li><a href="https://goo.gl/maps/shpvxuvHpPm" class="py-2 d-block"><?= $adress;?></a></li>
                <li><a href="tel:<?= $contact->phone;?>" class="py-2 d-block"><?= $contact->phone;?></a></li>
                <li><a href="mailto:<?= $contact->email;?>" class="py-2 d-block"><?= $contact->email;?></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <ul class="ftco-footer-social list-unstyled float-md-right float-lft">
                <li class="ftco-animate"><a href="<?= $contact->telegram;?>"><span class="icon-telegram"></span></a></li>
                <li class="ftco-animate"><a href="<?= $contact->facebook;?>"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="<?= $contact->instagram;?>"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <?php endforeach?>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>&copy; <?= date('Y');?> <?= Yii::t('app', 'Barcha huquqlar himoyalangan');?> | <?= Yii::t('app', 'Saytdan olingan ma\'lumotlarni chop etganda boshqarma saytiga havola qilish majburiy.');?></p>
          </div>
        </div>
      </div>
    </footer>