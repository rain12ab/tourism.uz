<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeamSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Boshqarma tuzilmasi';
$this->params['breadcrumbs'][] = ['label' => 'Boshqarma ma\'lumotlari', 'url' => ['about/selector'], 'data-pjax' => '0',];
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Qo\'shish', ['create'], ['class' => 'btn btn-primary']) ?>
</p>
<div class="card">
    <div class="card-header text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-body">
        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'label' => 'Rasm',
                    'format' => 'raw',
                    'value' => function($data){
                        return Html::img(Url::toRoute('../'.$data->pic),[
                            'style' => 'width:150px;'
                        ]);
                    },
                ],
                'full_name_uz',
                'full_name_ru',
                'full_name_en',
                'post_uz',
                'post_ru',
                'post_en',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update}{delete}',
                    'buttons'=>[
                        'update'=>function ($url, $model) {
                            $customurl=Yii::$app->getUrlManager()->createUrl(['team/update','id'=> $model['id']]);
                            return \yii\helpers\Html::a( '<span class="far fa-edit"></span>', $customurl,
                                                    ['title' => Yii::t('yii', 'O\'zgartirish'), 'data-pjax' => '0']);

                        },
                        'delete'=>function ($url, $model) {
                            $customurl=Yii::$app->getUrlManager()->createUrl(['team/delete','id'=> $model['id']]);
                            return \yii\helpers\Html::a( '<span class="fas fa-times"></span>', $customurl,
                                                    ['title' => Yii::t('yii', 'O\'chirish'), 'data-pjax' => '0', 'data-method' => 'post', 'data-confirm' => 'Aniqmi?',]);
                        }
                    ],
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
