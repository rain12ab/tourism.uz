<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hotels */

$this->title = $model->name_uz;
$this->params['breadcrumbs'][] = ['label' => 'Mehmonxonalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hotels-view">

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
                    <h2 class="card-title">Mexmonxona haqida to'liq ma'lumot</h2>
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
                        </div>
                        <div class="col-md-4">
                            <img src="<?= Yii::$app->homeUrl.'../'.$model->pic_main;?>" style="width: 100%;">
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
                </div>
            </div>
        </div>
    </div>


</div>
