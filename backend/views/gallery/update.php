<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */

$this->title = $model->title_uz.'ni o\'zgartirish';
$this->params['breadcrumbs'][] = ['label' => 'Galereya', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
