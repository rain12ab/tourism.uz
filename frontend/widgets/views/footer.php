<?php

use yii\helpers\Url;

?>
<?php foreach ($all as $one):?>
  <footer class="probootstrap-footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="probootstrap-copyright">&copy; <?= date('Y');?> <a href="<?= Yii::$app->homeUrl;?>"><?= Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');?></a><br><?= Yii::t('app', 'Barcha huquqlar himoyalangan');?></p>
          <ul class="probootstrap-social">
            <li><a href="<?= $one->facebook;?>"><i class="icon-facebook2"></i></a></li>
            <li><a href="<?= $one->instagram;?>"><i class="icon-instagram2"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
<?php endforeach;?>