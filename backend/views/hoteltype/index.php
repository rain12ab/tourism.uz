<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\HoteltypeSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mehmonxonalar turi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoteltype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <p>
        <?= Html::a('Qo\'shish', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name_uz',
            'name_ru',
            'name_en',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{delete}',
                'buttons'=>[
                    'update'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['hoteltype/update','id'=> $model['id']]);
                        return \yii\helpers\Html::a( '<span style="margin: 5px;" class="far fa-edit"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'O\'zgartirish'), 'data-pjax' => '0']);

                    },
                    'delete'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['hoteltype/delete','id'=> $model['id']]);
                        return \yii\helpers\Html::a( '<span style="margin: 5px;" class="fas fa-times"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'O\'chirish'), 'data-pjax' => '0', 'data-method' => 'post', 'data-confirm' => 'Aniqmi?',]);
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
