<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Objects */

$this->title = $model->name_uz.'ni o\'zgaritish';
$this->params['breadcrumbs'][] = ['label' => 'Turistik obyektlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objects-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
