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

?>

<section id="contact">
    <div class="row">
        <?php foreach ($all as $one):?>
        <div class="col-md-7">
            <?php $coord = new LatLng(['lat' => $one->lat, 'lng' => $one->lng]);
            $gmapstyle = '[ { "featureType": "landscape", "stylers": [ { "hue": "#F600FF" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 } ] }, { "featureType": "road.highway", "stylers": [ { "hue": "#DE00FF" }, { "saturation": -4.6000000000000085 }, { "lightness": -1.4210854715202004e-14 }, { "gamma": 1 } ] }, { "featureType": "road.arterial", "stylers": [ { "hue": "#FF009A" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 } ] }, { "featureType": "road.local", "stylers": [ { "hue": "#FF0098" }, { "saturation": 0 }, { "lightness": 0 }, { "gamma": 1 } ] }, { "featureType": "water", "stylers": [ { "hue": "#EC00FF" }, { "saturation": 72.4 }, { "lightness": 0 }, { "gamma": 1 } ] }, { "featureType": "poi", "stylers": [ { "hue": "#7200FF" }, { "saturation": 49 }, { "lightness": 0 }, { "gamma": 1 } ] } ]';
            $map = new Map([
                'center' => $coord,
                'mapTypeId' => roadmap,
                'zoom' => 17,
                'mapMaker' => TRUE,
                'noClear' => true,
                'disableDefaultUI' => true,
                'styles' => $gmapstyle,
            ]);
            $marker = new Marker([
                'position' => $coord,
                'title' => Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi'),
            ]);
            $map->addOverlay($marker);
            echo $map->display();
            ?>
        </div>
        <div class="col-md-5">
            <div style="margin-top: 40px;">
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-envelope"></span>
                            <h3>Email</h3>
                            <a href="#"><?= $one->email;?></a>
                        </div>
                    </section>
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-phone"></span>
                            <h3><?= Yii::t('app', 'Telefon');?></h3>
                            <span><?= $one->phone;?></span>
                        </div>
                    </section>
                    <section>
                        <?php
                            if(Yii::$app->language == 'uz')
                              {
                                $adress = $one->adress_uz;
                              }
                            else if(Yii::$app->language == 'ru')
                              {
                                $adress = $one->adress_ru;
                              }
                            else if(Yii::$app->language == 'en')
                              {
                                $adress = $one->adress_en;
                              }
                            else
                              {
                                $adress = null;    
                              }
                        ?>
                        <div class="contact-method">
                            <span class="icon alt fa-home"></span>
                            <h3><?= Yii::t('app', 'Manzil');?></h3>
                            <span><?= $adress;?></span>
                        </div>
                    </section>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</section>