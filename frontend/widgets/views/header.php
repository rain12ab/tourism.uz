<?php
// style="display: flex; align-items: center; justify-content: center; margin-top: 10px; margin-right: -1rem;"
// style="margin-top: 40px; margin-left: 40%;"
/*<?= Yii::$app->request->baseUrl;?>/images/flags/<?= $one->language_code_id;?>*/
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$current_lang = common\models\Language::find()->where(['language_code_id' => common\models\Country::find()->where(['language_code' => Yii::$app->language])->select('id')->one()])->select('name')->one();
$current_lang_code = common\models\Country::find()->where(['language_code' => Yii::$app->language])->select('language_code')->one();
?>
<style type="text/css">
.dropdown-menu {
  background-color: #fff;
}
  @media screen and (max-width: 991px) {
      .site-logo {
          display: none;
      }
      .navbar-collapse {
        background: url('<?= Yii::$app->request->baseUrl;?>/images/logo/hidden_logo.png') no-repeat;
        background-size: contain;
        background-position: right;
      }
      .dropdown-menu {
        background-color: #0000;
      }
  }
  .navbar
  {
    margin-bottom: -20px;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <img class="site-logo" style="margin-right: 10px;" src="<?= Yii::$app->request->baseUrl;?>/images/logo/logo.png" /><a class="navbar-brand" href="<?= Yii::$app->homeUrl;?>"><h6><?= Yii::t('app', 'Navoiy viloyat turizmni<br>rivojlantirish hududiy<br>boshqarmasi');?></h6></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="<?= Yii::$app->homeUrl;?>"><?= Yii::t('app', 'Bosh sahifa');?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['about/index']);?>"><?= Yii::t('app', 'Boshqarma haqida');?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['laws/index']);?>"><?= Yii::t('app', 'Qonunchilik');?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['news/index']);?>"><?= Yii::t('app', 'Yangiliklar');?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['contacts/index']);?>"><?= Yii::t('app', 'Kontaktlar');?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['site/select']);?>"><?= Yii::t('app', 'Sayyohlarga');?></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""><img style="width: 35px;height: auto;margin-right: 5px;" src="<?= Yii::$app->request->baseUrl;?>/images/flags/<?= $current_lang_code->language_code;?>.gif"><?= $current_lang->name;?>
          </a>
          <ul class="dropdown-menu">
            <?php foreach($all as $one):?>
            <!-- <li><a href="<?= Url::to(['/site/language', 'ln' => $one->langname->language_code]); ?>"><img style="width: 35px;height: auto;padding: 3px;" src="<?= Yii::$app->request->baseUrl;?>/images/flags/<?= $one->langname->language_code;?>.gif"><?= $one->name;?></a></li> -->
            <?= Html::tag('li', Html::a(Html::img(Yii::$app->request->baseUrl.'/images/flags/'.$one->langname->language_code.'.gif', ['style' => 'width: 35px;height: auto;padding: 3px;']).$one->name, array_merge(\Yii::$app->request->get(),[\Yii::$app->controller->route, 'language' => $one->langname->language_code])));?>
            <?php endforeach?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>