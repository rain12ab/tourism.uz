<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Message */

$this->title = Yii::t('yii', 'Update') . ' : ' . \yii\helpers\StringHelper::truncateWords($model->translation,5);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'language' => $model->language]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="message-update">
    <br>
    <br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
