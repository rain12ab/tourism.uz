<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Message */

$this->title = $model->translation;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <br>

    <p>
        <?= Html::a(Yii::t('yii', 'Translate Message'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id, 'language' => $model->language], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id, 'language' => $model->language], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php
    //$img =  '<img style="width:30px; height:20px;"  src="'.Yii::getAlias('@web_site').'/media/flags/'.$model->language.'.gif">';
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=> 'language',
                'value'=> $img.' — ' .$model->language,
                'format'=>'raw'
            ],
            [
                'attribute'=>'id',
                'value'=>$model->id0->message,
                'label'=>Yii::t('yii','Source Message')
            ],
            'translation:ntext',
        ],
    ]) ?>

</div>
