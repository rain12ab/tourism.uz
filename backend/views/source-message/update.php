<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SourceMessage */

$this->title = Yii::t('yii', 'Update') . ' : ' . $model->message;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="source-message-update">

    <br>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
