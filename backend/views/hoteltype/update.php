<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hoteltype */

$this->title = $model->name_uz.'ni o\'zgartirish';
$this->params['breadcrumbs'][] = ['label' => 'Mehmonxonalar turi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_uz.'ni o\'zgartirish', 'url' => ['view', 'id' => $model->name_uz.'ni o\'zgartirish']];
?>
<div class="hoteltype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
