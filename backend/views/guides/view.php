<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hotels */

$this->title = $model->full_name_uz;
$this->params['breadcrumbs'][] = ['label' => 'Gidlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$language = common\models\Country::find()->where(['id' => $model->languages])->asArray()->all();
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
                    <h2 class="card-title">Gid haqida to'liq ma'lumot</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(full_name_uz);?></label>
                                    <p type="text" class="form-control"><?= $model->full_name_uz;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(full_name_ru);?></label>
                                    <p type="text" class="form-control"><?= $model->full_name_ru;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= $model->getAttributeLabel(full_name_en);?></label>
                                    <p type="text" class="form-control"><?= $model->full_name_en;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><?= $model->getAttributeLabel(phone);?></label>
                                    <p type="text" class="form-control"><?= $model->phone;?></p>
                                </div>
                                <div class="col-md-6">
                                    <label><?= $model->getAttributeLabel(email);?></label>
                                    <p type="text" class="form-control"><?= $model->email;?></p>
                                </div>
                            </div>
                            <div style="margin-top: 20px;" class="row">
                                <div class="col-md-12">
                                    <ul style="color: #fff;" class="list-inline"><i style="font-size: 20px;" class="fas fa-language"></i> Tillar:
                                    <?php foreach ($language as $l): ?>
                                        <li class="list-inline-item">
                                         <img style="width: 40px; height: 30px; padding: 5px 5px;" src="<?= $url.'images/flags/'.$l['language_code'].'.gif';?>"><span style="text-transform: uppercase;"><?= $l['language_code'];?></span>
                                         </li>
                                    <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
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
                                    <label><?= $model->getAttributeLabel(pic);?></label>
                                    <?= Html::a(Html::img($url.$model->pic, ['style' => 'width: 100%;']), $url.$model->pic, ['rel' => 'fancybox']);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   