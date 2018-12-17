<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Gallery */

$this->title = 'Galereyaga rasm kiritish';
$this->params['breadcrumbs'][] = ['label' => 'Galereya', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
