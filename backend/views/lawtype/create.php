<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Lawtype */

$this->title = 'Create Lawtype';
$this->params['breadcrumbs'][] = ['label' => 'Lawtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lawtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
