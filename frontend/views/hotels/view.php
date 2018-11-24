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
        $adress = $model->adress_uz;
        $content = $model->content_uz;
        $district = $model->district->name_uz;
        $type = $model->type->name_uz;;
    }
else if(Yii::$app->language == 'ru')
    {
        $name = $model->name_ru;
        $adress = $model->adress_ru;
        $content = $model->content_ru;
        $district = $model->district->name_ru;
        $type = $model->type->name_ru;;
    }
else if(Yii::$app->language == 'en')
    {
        $name = $model->name_en;
        $adress = $model->adress_en;
        $content = $model->content_en;
        $district = $model->district->name_en;
        $type = $model->type->name_en;;
    }
else
    {
        $name = null;
        $type = null;
        $adress = null;
        $content = null;
        $district = null;
    }


$url = Yii::$app->homeUrl;
$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ovqatlanish maskanlari'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
.res-name {
    font-family: 'Caveat', cursive;
    text-align: center;
    font-size: 50px;
    padding-top: 30px;
}
.special-font {
    color: #fff;
}
.block-20 {
    height: 350px;
}
@media screen and (max-width: 991px) {
    .ftco-section-2 .section-2-blocks-wrapper .text {
        background: #20214e;
        background-size: contain;
        background-position: right;
    }
    #gmap0-map-canvas {
        height: 500px!important;
    }
}
@media (min-width: 768px){
    .ftco-section-2 .section-2-blocks-wrapper .text {
        padding: 1% 3%;
        background: #20214e;
        background-size: contain;
        background-position: right;
    }
}
</style>
<section class="ftco-section-2">
    <div class="container-fluid d-flex">
        <div class="section-2-blocks-wrapper row no-gutters">
            <div class="text col-md-6 ftco-animate">
                <div style="margin-bottom: 20px;" class="text-inner align-self-start special-font">
                    <h1 class="special-font res-name"><?= $name;?></h1>
                    <div class="ftco-animate" style="text-align: center; font-size: 50px; color: #ffd700;">
                        <?php for($i=0; $i < $model->stars; $i++):?>
                            <span class="icon-star"></span>
                        <?php endfor?>
                    </div>
                    <?= $content;?>
                </div>
                <h4 style="font-size: 20px;" class="special-font"><b><?= Yii::t('app', 'Ma\'lumotlar');?></b></h4>
                <div class="row">
                    <div class="col-md-4">
                        <div style="padding: 10px 0;"><i style="color: #fff; font-size: 20px;" class="fas fa-map-marker-alt"></i><a style="margin-left: 10px; color: #fff;" href="#"><?= $adress;?></a></div>
                        <div style="padding: 10px 0;"><i style="color: #fff; font-size: 20px;" class="fas fa-phone"></i><a style="margin-left: 10px; color: #fff;" href="tel:<?= $model->phone;?>"><?= '+'.$model->phone;?></a></div>
                    </div>
                    <div class="col-md-4">
                        <div style="padding: 6px 0;color: #fff; font-size: 17px;"><?= Yii::t('app', 'Turi').': '.$type;?></a></div>
                        <div style="padding: 6px 0;color: #fff; font-size: 17px;"><?= Yii::t('app', 'Joylashgan joyi').': '.$district;?></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ftco-animate">
                <?php $coord = new LatLng(['lat' => $model->lat, 'lng' => $model->lng]);
                $mapStyle = '[ { "featureType": "administrative", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road", "elementType": "labels", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "water", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "transit", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "landscape", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.highway", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road.local", "stylers": [ { "visibility": "on" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "visibility": "on" } ] }, { "featureType": "water", "stylers": [ { "color": "#84afa3" }, { "lightness": 52 } ] }, { "stylers": [ { "saturation": -17 }, { "gamma": 0.36 } ] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [ { "color": "#3f518c" } ] } ]';
                $map = new Map([
                  'center' => $coord,
                  'zoom' => 17,
                  'height' => '100%',
                  'styles' => $mapStyle,
                  'disableDefaultUI' => true,
                  'noClear' => true,
                ]);
                $marker = new Marker([
                'position' => $coord,
                ]);

                $map->addOverlay($marker);

                echo $map->display();?>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section-2">
    <div class="container-fluid">
        <div class="section-2-blocks-wrapper row no-gutters">
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
            ?>
            <div class="col-sm-6 col-lg-4 ftco-animate">
            <?= Html::a('', $url.$model->pic_main, ['rel' => 'fancybox', 'class' => 'block-20', 'style' => 'background-image: url('.$url.$model->pic_main.')']);?>
            </div>
            <?php for ($i=0; $i < count($model->pictures); $i++):?>
                <div class="col-sm-6 col-lg-4 ftco-animate">
                    <?= Html::a('', $url.$model->pictures[$i], ['rel' => 'fancybox', 'class' => 'block-20', 'style' => 'background-image: url('.$url.$model->pictures[$i].')']);?>
                </div>
            <?php endfor?>
        </div>
    </div>
</section>

