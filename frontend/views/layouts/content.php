<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\AwesomeAsset;
use frontend\widgets\HeaderWidget;
use frontend\widgets\FooterWidget;
use frontend\widgets\WeatherWidget;
use frontend\models\BreadcrumbsMicrodata;

// Yii::$app->name = Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');
// $this->title = Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');

AppAsset::register($this);
AwesomeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
  

    
  <?= HeaderWidget::widget();?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="min-height: 575px;background-image: url('<?= Yii::$app->request->baseUrl;?>/images/bg/<?= Yii::$app->controller->id;?>.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center">
          <div class="col-md-12 ftco-animate">
            <?= BreadcrumbsMicrodata::widget([
                'options' => [
                    'class' => 'breadcrumbs',
                ],
                'homeLink' => [
                    'label' => Yii::t('yii', 'Home'),
                    'url' => ['/site/index'],
                    'class' => 'home',
                    'template' => '<span class="mr-2">{link}</span>',
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'itemTemplate' => '<span>/ {link}</span>',
                'activeItemTemplate' => '<span style="margin-left: 5px;" class="active">/ {link}</span>',
                'tag' => 'p',
                'encodeLabels' => false
            ]);
            ?>
            <?= WeatherWidget::widget();?>
          </div>
        </div>
      </div>
    </div>
</section>

  <?= $content;?>

  <?= FooterWidget::widget();?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
