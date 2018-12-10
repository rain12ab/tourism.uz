<?php 

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
use yii\bootstrap4\Modal;

?>




<div class="row">
	<div class="col-md-4">
		<label><?= $model->getAttributeLabel(adress_uz);?></label>
		<p type="text" class="form-control"><?= $model->adress_uz;?></p>
	</div>
	<div class="col-md-4">
		<label><?= $model->getAttributeLabel(adress_ru);?></label>
		<p type="text" class="form-control"><?= $model->adress_ru;?></p>
	</div>
	<div class="col-md-4">
		<label><?= $model->getAttributeLabel(adress_en);?></label>
		<p type="text" class="form-control"><?= $model->adress_en;?></p>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<label><?= $model->getAttributeLabel(telegram);?></label>
		<p type="text" class="form-control"><?= $model->telegram;?></p>
	</div>
	<div class="col-md-4">
		<label><?= $model->getAttributeLabel(facebook);?></label>
		<p type="text" class="form-control"><?= $model->facebook;?></p>
	</div>
	<div class="col-md-4">
		<label><?= $model->getAttributeLabel(instagram);?></label>
		<p type="text" class="form-control"><?= $model->instagram;?></p>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<label><?= $model->getAttributeLabel(phone);?></label>
		<p type="text" class="form-control"><?= $model->phone;?></p>
	</div>
	<div class="col-md-3">
		<label><?= $model->getAttributeLabel(email);?></label>
		<p type="text" class="form-control"><?= $model->email;?></p>
	</div>
	<div class="col-md-3">
		<label><?= $model->getAttributeLabel(lat);?></label>
		<p type="text" class="form-control"><?= $model->lat;?></p>
	</div>
	<div class="col-md-3">
		<label><?= $model->getAttributeLabel(lng);?></label>
		<p type="text" class="form-control"><?= $model->lng;?></p>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
<?php Modal::begin([
	'toggleButton' => ['label' => 'Xaritani ko\'rish', 'class' => 'btn btn-primary'],
	'size' => 'modal-lg',
]);?>
<style type="text/css">
.map-responsive{
    overflow:hidden;
    padding-bottom: 10px;
    position:relative;
</style>
<div class="container-fluid">
	<div class="map-responsive">
	<?php
      $coord = new LatLng(['lat' => $model->lat, 'lng' => $model->lng]);
      $mapStyle = '[ { "featureType": "administrative", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road", "elementType": "labels", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "water", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "transit", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "landscape", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.highway", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road.local", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "visibility": "on" } ] }, { "featureType": "water", "stylers": [ { "color": "#84afa3" }, { "lightness": 52 } ] }, { "stylers": [ { "saturation": -17 }, { "gamma": 0.36 } ] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [ { "color": "#3f518c" } ] } ]';
      $map = new Map([
      'center' => $coord,
      'zoom' => 17,
      'width' => '1000',
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
<?php Modal::end();?>
	</div>
</div>