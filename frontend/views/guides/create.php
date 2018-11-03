<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Guides */

$this->title = Yii::t('app', 'Create Guides');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Guides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guides-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
