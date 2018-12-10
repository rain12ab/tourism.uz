<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title_uz;
$this->params['breadcrumbs'][] = ['label' => 'Yangiliklar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">
    <p>
        <?= Html::a('O\'zgartirish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
                    <h2 class="card-title">Yangilik haqida to'liq ma'lumot</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(title_uz);?></label>
                                    <p type="text" class="form-control"><?= $model->title_uz;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(title_ru);?></label>
                                    <p type="text" class="form-control"><?= $model->title_ru;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(title_en);?></label>
                                    <p type="text" class="form-control"><?= $model->title_en;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><?= $model->getAttributeLabel(author);?></label>
                                    <p type="text" class="form-control"><?= $model->author;?></p>
                                </div>
                                <div class="col-md-6">
                                    <label><?= $model->getAttributeLabel(date);?></label>
                                    <p type="text" class="form-control"><?= $model->date;?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="<?= Yii::$app->homeUrl.'../'.$model->pic;?>" style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label><?= $model->getAttributeLabel(content_uz);?></label>
                            <p style="padding: 10px; border: 1px solid #2b3553; border-radius: 0.4285rem"><?= $model->content_uz;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label><?= $model->getAttributeLabel(content_ru);?></label>
                            <p style="padding: 10px; border: 1px solid #2b3553; border-radius: 0.4285rem"><?= $model->content_ru;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label><?= $model->getAttributeLabel(content_en);?></label>
                            <p style="padding: 10px; border: 1px solid #2b3553; border-radius: 0.4285rem"><?= $model->content_en;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
