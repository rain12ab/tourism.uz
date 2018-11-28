<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lawtype */

$this->title = 'Update Lawtype: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lawtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lawtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
