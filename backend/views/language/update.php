<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Language */

$this->title = Yii::t('yii', 'Изменить') . ' : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="language-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
