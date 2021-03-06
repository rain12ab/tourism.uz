<?php

use yii\helpers\Url;
use yii\helpers\Html;
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

<div class="row block-9 mb-4">
  <div class="col-md-8 probootstrap-animate">
    <?= MessageWidget::widget();?>
  </div>
  <div class="col-md-4 col-md-push-1 probootstrap-animate">
    <h4><?= Yii::t('app', 'Kontaklar');?></h4>
      <div style="padding: 10px;"><i style="margin: 0 5px;" class="fas fa-map-marker-alt"></i> <a href="https://goo.gl/maps/shpvxuvHpPm"><?= $model->adress_uz;?></a></div>
      <div style="padding: 10px;"><i style="margin: 0 5px;" class="fas fa-envelope"></i><a href="mailto:<?= $model->email;?>"><?= $model->email;?></a></div>
      <div style="padding: 10px;"><i style="margin: 0 5px;" class="fas fa-phone"></i><a href="tel:<?= $model->phone;?>"><?= $model->phone;?></a></div>
  </div>
</div>
<div class="row mt-5">
  <div class="col-md-12">
    <?php
      $coord = new LatLng(['lat' => $model->lat, 'lng' => $model->lng]);
      $mapStyle = '[ { "featureType": "all", "elementType": "labels.text.fill", "stylers": [ { "color": "#ffffff" } ] }, { "featureType": "all", "elementType": "labels.text.stroke", "stylers": [ { "color": "#000000" }, { "lightness": 13 } ] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [ { "color": "#000000" } ] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [ { "color": "#144b53" }, { "lightness": 14 }, { "weight": 1.4 } ] }, { "featureType": "landscape", "elementType": "all", "stylers": [ { "color": "#08304b" } ] }, { "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#0c4152" }, { "lightness": 5 } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#000000" } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "color": "#0b434f" }, { "lightness": 25 } ] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [ { "color": "#000000" } ] }, { "featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [ { "color": "#0b3d51" }, { "lightness": 16 } ] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [ { "color": "#000000" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "color": "#146474" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "color": "#021019" } ] } ]';
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
 	