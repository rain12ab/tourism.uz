<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Laws */

$this->title = 'Yangi hujjat kiritish';
$this->params['breadcrumbs'][] = ['label' => 'Qonunchilik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
