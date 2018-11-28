<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\GalleryAsset;
use frontend\assets\AwesomeAsset;
use frontend\models\BreadcrumbsMicrodata;

// Yii::$app->name = Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');
// $this->title = Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');

GalleryAsset::register($this);
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
<body class="is-preload">
<?php $this->beginBody() ?>
<div id="wrapper">
<?= $content;?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
