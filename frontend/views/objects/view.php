<?php

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

/* @var $this yii\web\View */
/* @var $model common\models\Objects */

if(Yii::$app->language == 'uz')
    {
        $name = $model->name_uz;
        $content = $model->content_uz;
        $district = $model->district->name_uz;
    }
else if(Yii::$app->language == 'ru')
    {
        $name = $model->name_ru;
        $content = $model->content_ru;
        $district = $model->district->name_ru;
    }
else if(Yii::$app->language == 'en')
    {
        $name = $model->name_en;
        $content = $model->content_en;
        $district = $model->district->name_en;
    }
else
    {
        $name = null;
        $content = null;
        $district = null;
    }

// $json = json_decode($model->pictures);
$url = Yii::$app->homeUrl;
$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Turistik joylar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="ftco-section">
    <div class="carousel1 owl-carousel ftco-owl">
        <?php echo newerton\fancybox\FancyBox::widget([
            'target' => 'a[rel=fancybox]',
            'helpers' => true,
            'mouse' => true,
            'config' => [
                'maxWidth' => '90%',
                'maxHeight' => '90%',
                'playSpeed' => 0,
                'padding' => 0,
                'fitToView' => false,
                'width' => '70%',
                'height' => '70%',
                'autoSize' => false,
                'closeClick' => false,
                'openEffect' => 'over',
                'closeEffect' => 'over',
                'prevEffect' => 'over',
                'nextEffect' => 'over',
                'closeBtn' => false,
                'openOpacity' => true,
                'helpers' => [
                    'title' => ['type' => 'over'],
                    'overlay' => [
                        'css' => [
                            'background' => 'rgba(0, 0, 0, 0.8)'
                        ]
                    ]
                ],
            ]
        ]);

        echo Html::a('', $url.$model->pic_main, ['rel' => 'fancybox', 'class' => 'block-20', 'style' => 'background-image: url('.$url.$model->pic_main.')']);
        for ($i=0; $i < count($model->pictures); $i++) { 
            echo Html::a('', $url.$model->pictures[$i], ['rel' => 'fancybox', 'class' => 'block-20', 'style' => 'background-image: url('.$url.$model->pictures[$i].')']);
        }
        
        ?>
    </div>
    <div class="container">
        <div style="margin-top: 30px;" class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;" class="md-3"><?= $name;?></h1>
                <p><?= $content;?></p>
            </div>
        </div>
        <div style="margin-top: 30px;" class="row mt-5">
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
                  ]);

                  $map->addOverlay($marker);

                  echo $map->display();
                ?>
            </div>
        </div>
    </div>
</section>
