<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\About */

$this->title = 'Boshqarma haqida ma\'lumotlarni yangilash';
$this->params['breadcrumbs'][] = ['label' => 'Boshqarma haqida', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
