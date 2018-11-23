<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;
use frontend\widgets\MessageWidget;

if(Yii::$app->language == 'uz')
  {
    $adress = $model->adress_uz;
  }
else if(Yii::$app->language == 'ru')
  {
    $adress = $model->adress_ru;
  }
else if(Yii::$app->language == 'en')
  {
    $adress = $model->adress_en;
  }
else
  {
    $adress = null;    
  }

?>

<h1 class="mb-3" style="text-align: center; margin-top: 50px;"><?= Yii::t('app', 'Agarda sizda savollaring bo\'lsa, murojaat qiling');?></h1>

<div class="row block-9 mb-4" style="margin-top: 50px;">
  <div class="col-md-7 ftco-animate">
    <?= MessageWidget::widget();?>
  </div>
  <div class="col-md-5 col-md-push-1 ftco-animate">
    <h3><b><?= Yii::t('app', 'Kontaklar');?></b></h3>
      <div style="padding: 10px 0;"><i style="color: #405bb3; font-size: 20px;" class="fas fa-map-marker-alt"></i><a style="margin-left: 10px;" href="https://goo.gl/maps/shpvxuvHpPm"><?= $model->adress_uz;?></a></div>
      <div style="padding: 10px 0;"><i style="color: #405bb3; font-size: 20px;" class="fas fa-envelope"></i><a style="margin-left: 10px;" href="mailto:<?= $model->email;?>"><?= $model->email;?></a></div>
      <div style="padding: 10px 0;"><i style="color: #405bb3; font-size: 20px;" class="fas fa-phone"></i><a style="margin-left: 10px;" href="tel:<?= $model->phone;?>"><?= $model->phone;?></a></div>
      <div style="padding: 10px 0;"><i style="color: #405bb3; font-size: 20px;" class="fab fa-facebook"></i><a style="margin-left: 10px;" href="<?= $model->facebook;?>"><?= substr($model->facebook, 8);?></a></div>
      <div style="padding: 10px 0;"><i style="color: #405bb3; font-size: 20px;" class="fab fa-instagram"></i><a style="margin-left: 10px;" href="<?= $model->instagram;?>"><?= substr($model->instagram, 8);?></a></div>
      <div style="padding: 10px 0;"><i style="color: #405bb3; font-size: 20px;" class="fab fa-telegram"></i><a style="margin-left: 10px;" href="<?= $model->telegram;?>"><?= substr($model->telegram, 8);?></a></div>
  </div>
</div>
<div class="row mb-5">
  <div class="col-md-12">
    <?php
      $coord = new LatLng(['lat' => $model->lat, 'lng' => $model->lng]);
      $mapStyle = '[ { "featureType": "administrative", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road", "elementType": "labels", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "water", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "transit", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "landscape", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.highway", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road.local", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "visibility": "on" } ] }, { "featureType": "water", "stylers": [ { "color": "#84afa3" }, { "lightness": 52 } ] }, { "stylers": [ { "saturation": -17 }, { "gamma": 0.36 } ] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [ { "color": "#3f518c" } ] } ]';
      $map = new Map([
      'center' => $coord,
      'zoom' => 17,
      'styles' => $mapStyle,
      'disableDefaultUI' => true,
      'noClear' => true,
      ]);
      $marker = new Marker([
      'position' => $coord,
      'title' => Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi'),
      ]);
      $marker->attachInfoWindow(new InfoWindow([
      'content' => Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi'),
      ])
      );

      $map->addOverlay($marker);

      echo $map->display();
    ?>
  </div>
</div>
 	