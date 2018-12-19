<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LawsSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slayder';
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title_uz',
            'title_ru',
            'title_en',
            [
                'label' => 'Rasm',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a(Html::img(Url::toRoute('../'.$data->img),[
                        'style' => 'width:150px;'
                    ]), Yii::$app->homeUrl.'../'.$data->img, ['rel' => 'fancybox']);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{delete}',
                'buttons'=>[
                    'update'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['slider/update','id'=> $model['id']]);
                        return \yii\helpers\Html::a( '<span style="margin: 3px;" class="far fa-edit"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'O\'zgartirish'), 'data-pjax' => '0']);

                    },
                    'delete'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['slider/delete','id'=> $model['id']]);
                        return \yii\helpers\Html::a( '<span style="margin: 3px;" class="fas fa-times"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'O\'chirish'), 'data-pjax' => '0', 'data-method' => 'post', 'data-confirm' => 'Aniqmi?',]);
                    }
                ],
            ],
            'turn',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
