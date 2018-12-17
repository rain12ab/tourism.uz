<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Objects */

$this->title = 'Turistik obyekt kiritish';
$this->params['breadcrumbs'][] = ['label' => 'Turistik obyektlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objects-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
