<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Laws */

$this->title = Yii::t('app', 'Create Laws');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Laws'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
