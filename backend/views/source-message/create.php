<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SourceMessage */

$this->title = Yii::t('yii', 'Добавление основного текста');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Основные тексты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
