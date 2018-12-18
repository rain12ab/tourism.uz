<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Gallery */

$this->title = 'Slayderga rasm kiritish';
$this->params['breadcrumbs'][] = ['label' => 'Slayder', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
