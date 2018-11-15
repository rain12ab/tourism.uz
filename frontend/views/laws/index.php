<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
// use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LawsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Qonunchilik');
$this->params['breadcrumbs'][] = $this->title;
if(Yii::$app->language == 'uz'){
    $name = $model->name_uz;
    $url = $model->url_uz;
} 
else if(Yii::$app->language == 'ru'){
    $name = $model->name_ru;
    $url = $model->url_ru;
} 
else
{
    null;
?>


<section class="probootstrap-section">
    <div class="container">
        <div class="row">
                <?php Pjax::begin(); ?>
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'export'=>false,
                    'pjax'=>true,
                    'striped'=>true,
                    'summary' => '',
                    'bordered'=>false,
                    'hover'=>true,
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
                            'attribute'=>'translation',
                            'hAlign'=>'left',
                            'vAlign'=>'middle',
                            'value'=>function($model){
                                $actions = '';
                                $actions .= '<div class="post-actions col-md-12" style="padding: 0">
                                                <a  href="'.\yii\helpers\Url::to([$url,'name'=>$name]).'">'.
                                    Yii::t('yii','Edit') .'
                                                </a> |
                                                <a  href="'.\yii\helpers\Url::to(['message/view','id'=>$model->id,'language'=>$model->language]).'">'.
                                    Yii::t('yii','View') .'
                                                </a> |
                                                <a  class="text-danger" href="'.\yii\helpers\Url::to(['message/delete','id'=>$model->id,'language'=>$model->language]).'"
                                                     data-confirm="'.Yii::t('yii','Are you sure you want to delete this item?').'" data-method="post"
                                                >'.
                                    Yii::t('yii','Delete Permanently') .'
                                                </a>
                                        </div>';
                            },
                            'format'=>"raw"
                        ],
                ]);?>
                
                <?php Pjax::end(); ?>

        </div>
    </div>
</section>
