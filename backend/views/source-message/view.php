<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SourceMessage */

$this->title = $model->message;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-view">

    <br>

    <p>
        <?= Html::a(Yii::t('yii', 'Create Source Message'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'message:ntext',
        ],
    ]) ?>

</div>
