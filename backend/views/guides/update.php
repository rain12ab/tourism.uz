<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Guides */

$this->title = $model->full_name_uz.'ni o\'zgartirish';
$this->params['breadcrumbs'][] = ['label' => 'Gidlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guides-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
