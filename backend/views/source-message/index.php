<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Основные тексты');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-index">

    <h1><?= Html::encode($this->title) ?><?= Html::a(Yii::t('yii', 'Добавить текст'), ['create'], ['class' => 'btn btn-success', 'style' => 'margin-left: 10px; font-size: 11px;']) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="clearfix"></div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'export'=>false,
        'pjax'=>true,
        'striped'=>true,
        'bordered'=>false,
        'hover'=>true,
        'summary' => '',
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
        'responsive'=>true,
        'persistResize'=>false,
        'rowOptions'   => function ($model, $key, $index, $grid) {
            return ['data-id' => $model->id,'class'=>'qe-tr-pointer', 'style' => 'font-size: 14px; background-color: #3c4858;'];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'options' => ['width' => '15px'],
            ],
            [
                'attribute'=>'Text',
                'hAlign'=>'left',
                'vAlign'=>'middle',
                'value'=>function($model){
                    $actions = '';
                    $actions .= '<div class="post-actions col-md-12" style="padding: 0">
                                    <a  href="'.\yii\helpers\Url::to(['source-message/update','id'=>$model->id]).'">'.
                        Yii::t('yii','Edit') .'
                                    </a> |
                                    <a  href="'.\yii\helpers\Url::to(['source-message/view','id'=>$model->id]).'">'.
                        Yii::t('yii','View') .'
                                    </a> |
                                    '.Html::a('Удалить', ['delete', 'id' => $model->id], [
                                'style' => 'color: red;',
                                'data' => [
                                    'method' => 'post',
                                ],
                            ]);
                        Yii::t('yii','Delete Permanently') .'
                                    </a>
                            </div>';

                    return $model->message .$actions;
                },
                'format'=>"raw"
            ],
        ],
    ]); ?>

</div>
