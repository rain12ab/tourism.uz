<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hotels */

$this->title = 'Mehmonxona kiritish';
$this->params['breadcrumbs'][] = ['label' => 'Mehmonxonalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotels-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
