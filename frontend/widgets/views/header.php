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
        border-color: #0000;
        box-shadow: 0 0 0 rgba(0, 0, 0, 0)
      }
      .dropdown-menu > li > a {
        color: #7777ff;
        padding: 10px;
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""><?= Yii::t('app', 'Qonunchilik');?>
          </a>
          <ul class="dropdown-menu">
            <?= Html::tag('li', Html::a(Yii::t('app', 'Normativ-hujjatlar'), Url::to(['laws/select'])));?>
            <?= Html::tag('li', Html::a(Yii::t('app', 'Davlat ramzlari'), Url::to(['laws/symbols'])));?>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['news/index']);?>"><?= Yii::t('app', 'Yangiliklar');?></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""><?= Yii::t('app', 'Sayyohlarga');?>
          </a>
          <ul class="dropdown-menu">
            <?= Html::tag('li', Html::a(Yii::t('app', 'Turistik obyektlar'), Url::to(['objects/index'])));?>
            <?= Html::tag('li', Html::a(Yii::t('app', 'Mehmonxonalar'), Url::to(['hotels/index'])));?>
            <?= Html::tag('li', Html::a(Yii::t('app', 'Ovqatlanish maskanlari'), Url::to(['restaurants/index'])));?>
            <?= Html::tag('li', Html::a(Yii::t('app', 'Gidlar'), Url::to(['guides/index'])));?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""><img style="width: 35px;height: auto;margin-right: 5px;" src="<?= Yii::$app->request->baseUrl;?>/images/flags/<?= $current_lang_code->language_code;?>.gif"><?= $current_lang->name;?>
          </a>
          <ul class="dropdown-menu">
            <?php foreach($all as $one):?>
            <?= Html::tag('li', Html::a(Html::img(Yii::$app->request->baseUrl.'/images/flags/'.$one->langname->language_code.'.gif', ['style' => 'width: 35px;height: auto;padding: 3px;']).$one->name, array_merge(\Yii::$app->request->get(),[\Yii::$app->controller->route, 'language' => $one->langname->language_code])));?>
            <?php endforeach?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>