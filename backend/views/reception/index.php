<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReceptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Virtual qabulxona');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reception-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Jarayonda'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Yopildi'), ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],

            'unique_number',
            'full_name',
            'title',
            'organization',
            'phone',
            'type',
            'datetime:datetime',
            'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{delete}{denial}',
                'buttons'=>[
                    'view'=> function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['reception/view','id'=> $model['id']]);
                        return \yii\helpers\Html::a( '<span style="margin: 1px;" class="far fa-eye"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'O\'zgartirish'), 'data-pjax' => '0']);

                    },
                    'delete'=> function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['reception/delete','id'=> $model['id']]);
                        return \yii\helpers\Html::a( '<span style="margin: 1px;" class="fas fa-times"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'O\'chirish'), 'data-pjax' => '0', 'data-method' => 'post', 'data-confirm' => 'Aniqmi?',]);
                    },
                    'denial'=> function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['reception/denial','id'=> $model['id']]);
                        return \yii\helpers\Html::a( '<span style="margin: 1px;" class="fas fa-ban"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'O\'chirish'), 'data-pjax' => '0', 'data-method' => 'post', 'data-confirm' => 'Aniqmi?',]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
