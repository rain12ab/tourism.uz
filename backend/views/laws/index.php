<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LawsSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qonunchilik';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .pagination li {
        padding-right: 20px;
    }
</style>
<div class="laws-index">

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
            'name_uz:ntext',
            'name_ru:ntext',
            'url_uz:url',
            'url_ru:url',
            'name.name_uz',
            'date',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{delete}',
                'buttons'=>[
                    'update'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['laws/update','id'=> $model['id']]);
                        return \yii\helpers\Html::a( '<span class="far fa-edit"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'O\'zgartirish'), 'data-pjax' => '0']);

                    },
                    'delete'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['laws/delete','id'=> $model['id']]);
                        return \yii\helpers\Html::a( '<span class="fas fa-times"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'O\'chirish'), 'data-pjax' => '0', 'data-method' => 'post', 'data-confirm' => 'Aniqmi?',]);
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
