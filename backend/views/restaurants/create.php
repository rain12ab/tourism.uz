<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Restaurants */

$this->title = 'Ovqatlanish maskani kiritish';
$this->params['breadcrumbs'][] = ['label' => 'Ovqatlanish maskanlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurants-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
