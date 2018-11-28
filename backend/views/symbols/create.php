<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Symbols */

$this->title = 'Create Symbols';
$this->params['breadcrumbs'][] = ['label' => 'Symbols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="symbols-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
