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
use frontend\widgets\ContactsWidget;
use frontend\widgets\FooterWidget;

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
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <style type="text/css">
      .probootstrap-section{
          background: url(<?= Yii::$app->request->baseUrl;?>/images/bg/bg.png) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
      }
      .breadcrumb{
        margin-bottom: -18px;
      }
    </style>
    <?php $this->head() ?>
</head>
<body class="is-preload">
<?php $this->beginBody() ?>
  
  <div class="probootstrap-loader"></div>

    <?= HeaderWidget::widget();?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content;?>

    <?= FooterWidget::widget();?>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>
  

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
