<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Laws */

$this->title = StringHelper::truncate($model->name_uz,30);
$this->params['breadcrumbs'][] = ['label' => 'Qonunchilik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title.' '.'o\'zgartirish';
?>
<div class="laws-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
