<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */

$this->title = $model->title_uz.' ni o\'zgartirish';
$this->params['breadcrumbs'][] = ['label' => 'Slayder', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
