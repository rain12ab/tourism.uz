<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Laws */

$this->title = 'Create Laws';
$this->params['breadcrumbs'][] = ['label' => 'Laws', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
