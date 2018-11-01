<?php

use yii\helpers\Url;

?>

  <div class="probootstrap-section">
    <div class="container text-center">
      <!-- <div class="row">
        <div class="col-md-6 col-md-offset-3 mb40">
          <h2>I'm a photographer</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>    
        </div>
      </div> -->

      <div class="row probootstrap-gutter16">
        <div class="col-md-4 probootstrap-animate" data-animate-effect="fadeIn">
          <a href="<?= Url::to(['objects/index']);?>" class="img-bg" style="background-image: url(images/bg/6.jpg);">
            <div class="probootstrap-photo-details">
              <h2><?= Yii::t('app', 'Turistik obyektlar');?></h2>
              <p><?= Yii::t('app', 'Arxitekturik, arxeologik va tabiat joylar');?></p>
            </div>
          </a>
        </div>
        <div class="col-md-8 probootstrap-animate" data-animate-effect="fadeIn">
          <a href="<?= Url::to(['hotels/index']);?>" class="img-bg" style="background-image: url(images/bg/2.jpg);">
            <div class="probootstrap-photo-details">
              <h2><?= Yii::t('app', 'Mehmonxonalar');?></h2>
              <p><?= Yii::t('app', 'Motellar, uymehmonxonalari v.h.k.');?></p>
            </div>
          </a>
        </div>
      </div>

      <div class="row probootstrap-gutter16">
        <div class="col-md-5 probootstrap-animate" data-animate-effect="fadeIn">
          <a href="<?= Url::to(['restaurants/index']);?>" class="img-bg" style="background-image: url(images/bg/3.jpg);">
            <div class="probootstrap-photo-details">
              <h2><?= Yii::t('app', 'Ovqatlanish maskanlari');?></h2>
              <p><?= Yii::t('app', 'Choyxonlar, restoranlar, kafe v.h.k.');?></p>
            </div>
          </a>
        </div>
        <div class="col-md-7 probootstrap-animate" data-animate-effect="fadeIn">
          <a href="<?= Url::to(['gallery/index']);?>" class="img-bg" style="background-image: url(images/bg/5.jpg);">
            <div class="probootstrap-photo-details">
              <h2><?= Yii::t('app', 'Gallereya');?></h2>
              <p><?= Yii::t('app', 'Navoiy viloyatidan fotolovhalar');?></p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>