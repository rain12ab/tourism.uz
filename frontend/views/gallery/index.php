<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Galereya');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="intro">
    <header>
        <h1><?= $this->title;?></h1>
        <p><?= Yii::t('app', 'Navoiy hayotidan fotolavhalar');?></p>
        <ul class="actions">
            <li><a href="#first" class="arrow scrolly"><span class="label">Next</span></a></li>
        </ul>
    </header>
    <div class="content">
        <span class="image fill" data-position="center"><img src="images/pic01.jpg" alt="" /></span>
    </div>
</section>
<section id="first">
    <header>
        <h2>Magna sed nullam nisl adipiscing</h2>
    </header>
    <div class="content">
        <p><strong>Lorem ipsum dolor</strong> sit amet consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tristique libero eu nibh porttitor amet fermentum. Nullam venenatis erat id vehicula ultrices sed ultricies condimentum. Magna sed etiam consequat, et lorem adipiscing sed nulla. Volutpat nisl et tempus et dolor libero, feugiat magna tempus, sed et lorem adipiscing.</p>
        <span class="image main"><img src="images/pic02.jpg" alt="" /></span>
    </div>
</section>
<section>
    <header>
        <h2>Feugiat consequat tempus ultrices</h2>
    </header>
    <div class="content">
        <p><strong>Etiam tristique libero</strong> eu nibh porttitor amet fermentum. Nullam venenatis erat id vehicula ultrices sed ultricies condimentum.</p>
        <ul class="feature-icons">
            <li class="icon fa-laptop">Consequat tempus</li>
            <li class="icon fa-bolt">Etiam adipiscing</li>
            <li class="icon fa-signal">Libero nullam</li>
            <li class="icon fa-gear">Blandit condimentum</li>
            <li class="icon fa-map-marker">Lorem ipsum dolor</li>
            <li class="icon fa-code">Nibh amet venenatis</li>
        </ul>
        <p>Vehicula ultrices sed ultricies condimentum. Magna sed etiam consequat, et lorem adipiscing sed nulla. Volutpat nisl et tempus et dolor libero, feugiat magna tempus, sed et lorem adipiscing.</p>
    </div>
</section>