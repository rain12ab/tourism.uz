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
use yii\bootstrap4\Modal;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hotels */

$this->title = $model->name_uz;
$this->params['breadcrumbs'][] = ['label' => 'Mehmonxonalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$url = Yii::$app->homeUrl.'../';
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yangilash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Aniqmi?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Mehmonxona haqida to'liq ma'lumot</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(name_uz);?></label>
                                    <p type="text" class="form-control"><?= $model->name_uz;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(name_ru);?></label>
                                    <p type="text" class="form-control"><?= $model->name_ru;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(name_en);?></label>
                                    <p type="text" class="form-control"><?= $model->name_en;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label><?= $model->getAttributeLabel(stars);?></label>
                                    <p type="text" class="form-control"><?= $model->stars;?></p>
                                </div>
                                <div class="col-md-4">
                                    <label><?= $model->getAttributeLabel(hotel_type);?></label>
                                    <p type="text" class="form-control"><?= $model->type->name_uz;?></p>
                                </div>
                                <div class="col-md-4">
                                    <label><?= $model->getAttributeLabel(district_id);?></label>
                                    <p type="text" class="form-control"><?= $model->district->name_uz;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label><?= $model->getAttributeLabel(price);?></label>
                                    <p type="text" class="form-control"><?= $model->price;?> so'm</p>
                                </div>
                                <div class="col-md-4">
                                    <label><?= $model->getAttributeLabel(phone);?></label>
                                    <p type="text" class="form-control">+<?= $model->phone;?></p>
                                </div>
                                <div class="col-md-4">
                                    <label><?= $model->getAttributeLabel(email);?></label>
                                    <p type="text" class="form-control"><?= $model->email;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(adress_uz);?></label>
                                    <p type="text" class="form-control"><?= $model->adress_uz;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(adress_ru);?></label>
                                    <p type="text" class="form-control"><?= $model->adress_ru;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(adress_en);?></label>
                                    <p type="text" class="form-control"><?= $model->adress_en;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div style="margin: 10px 0;" class="col-md-12">
                                    <label><?= $model->getAttributeLabel(content_uz);?></label>
                                    <div style="padding: 10px; border: 1px solid #2b3553; border-radius: 0.4285rem;"><?= $model->content_uz;?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div style="margin: 10px 0;" class="col-md-12">
                                    <label><?= $model->getAttributeLabel(content_ru);?></label>
                                    <div style="padding: 10px; border: 1px solid #2b3553; border-radius: 0.4285rem;"><?= $model->content_ru;?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div style="margin: 10px 0;" class="col-md-12">
                                    <label><?= $model->getAttributeLabel(content_en);?></label>
                                    <div style="padding: 10px; border: 1px solid #2b3553; border-radius: 0.4285rem;"><?= $model->content_en;?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div style="margin: 10px 0;" class="col-md-6">
                                    <label><?= $model->getAttributeLabel(lat);?></label>
                                    <p type="text" class="form-control"><?= $model->lat;?></p>
                                </div>
                                <div style="margin: 10px 0;" class="col-md-6">
                                    <label><?= $model->getAttributeLabel(lng);?></label>
                                    <p type="text" class="form-control"><?= $model->lng;?></p>
                                </div>
                            </div>
                            <?php Modal::begin([
                                    'toggleButton' => ['label' => 'Xarita', 'class' => 'btn btn-primary'],
                                    'size' => 'modal-lg',
                                ]);?>
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
                                <?php Modal::end();?>
                        </div>
                        <div class="col-md-4">
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
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(pic_main);?></label>
                                    <?= Html::a(Html::img($url.$model->pic_main, ['style' => 'width: 100%;']), $url.$model->pic_main, ['rel' => 'fancybox']);?>
                                </div>
                            </div>
                            <label style="margin-top: 20px;"><?= $model->getAttributeLabel(pictures);?></label>
                            <div class="row">
                                <?php for ($i=0; $i < count($model->pictures); $i++):?>
                                    <div style="margin-top: 10px;" class="col-md-6">
                                        <?= Html::a(Html::img($url.$model->pictures[$i], ['class' => 'img-fluid', 'style' => 'width: 100%;']), $url.$model->pictures[$i], ['rel' => 'fancybox']);?>
                                        <?= Html::a('O\'chirish', ['deletepic', 'id' => $model->id, 'i' => $i], [
                                            'class' => 'btn btn-danger text-center',
                                            'data' => [
                                                'confirm' => 'Aniqmi?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                    </div>
                                <?php endfor?>
                                <div style="margin-top: 10px;" class="col-md-6">
                                    <?php $form = ActiveForm::begin([
                                        'action' => ['addpic', 'id' => $model->id,],
                                        'id' => 'add-pic',
                                        'method' => 'post',
                                        
                                        'options' => [
                                            'data-pjax' => 1
                                        ],
                                    ]); ?>
                                    <label for="hotels-img_file">
                                    <div style="margin-bottom: -30px; padding: 2px 2px;" class="btn card">
                                        <div class="card-body">

                                            
                                            <i style="font-size: 40px;" class="fas fa-plus"></i><span style="font-size: 20px;">Qo'shish</span>
                                            
                                            <?= $form->field($model, 'img_file', ['template' => "{input}"])->fileInput();?>
                                            
                                        </div>
                                    </div>
                                    </label>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->registerJs('
document.getElementById("hotels-img_file").onchange = function() {
    document.getElementById("add-pic").submit();
};


', yii\web\View::POS_END);?>

<?php
    $this->registerJs(
        '$("document").ready(function(){
            $("#pjax_pics").on("pjax:end", function() {
            $.pjax.reload({container:"#pictures"});
        });
    });', yii\web\View::POS_END
    );
?>           