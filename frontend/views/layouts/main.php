<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\AwesomeAsset;
use frontend\widgets\HeaderWidget;
use frontend\widgets\MainWidget;
use frontend\widgets\MainSliderWidget;
use frontend\widgets\ContactsWidget;
use frontend\widgets\FooterWidget;
use frontend\widgets\AboutWidget;
use frontend\widgets\HotelWidget;
use frontend\widgets\ObjectWidget;
use frontend\widgets\NewsWidget;
use common\models\Language;
use common\models\Country;

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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
  

    
  <?= HeaderWidget::widget();?>
    
  <?= MainSliderWidget::widget();?>

  <?= AboutWidget::widget();?>

  <?= HotelWidget::widget();?>

  <?= ObjectWidget::widget();?>

  <?= NewsWidget::widget();?>

  <?= FooterWidget::widget();?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
