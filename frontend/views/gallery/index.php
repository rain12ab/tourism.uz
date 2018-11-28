<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Galereya');
$this->params['breadcrumbs'][] = $this->title;

$url = Yii::$app->homeUrl;
?>
<?= Html::a('<i style="margin-right: 10px;" class="fas fa-sign-out-alt"></i>'.Yii::t('app', 'Chiqish'), $url, ['class' => 'btn btn-primary','style' => 'margin: 10px;']);?>
<!-- Header -->
<header id="header">
    <h1><?= Yii::t('app', 'Galereya');?></h1>
    <ul class="icons">
        <?php foreach($contacts as $contact):?>
            <li><a target="_blank" href="<?= $contact->facebook;?>" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a target="_blank" href="<?= $contact->instagram;?>" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a target="_blank" href="<?= $contact->telegram;?>" class="icon fa-telegram"><span class="label">Telegram</span></a></li>
        <?php endforeach;?>
    </ul>
</header>
<section id="thumbnails">
    <?php foreach($pics as $pic):
    if (Yii::$app->language == 'uz') {
        $title = $pic->title_uz;
    }
    else if (Yii::$app->language == 'ru') {
        $title = $pic->title_ru;
    }
    else if (Yii::$app->language == 'en') {
        $title = $pic->title_en;
    }
    else {
        $title = null;
    }?>
        <article>
            <a class="thumbnail" href="<?= $url.$pic->url;?>" data-position="left center"><img src="<?= $url.$pic->url;?>" alt="" /></a>
            <h2><?= $title;?></h2>
        </article>
    <?php endforeach;?>
</section>