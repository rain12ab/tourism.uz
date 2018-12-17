<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hoteltype */

$this->title = 'Mehmonxona turlarini kiritish';
$this->params['breadcrumbs'][] = ['label' => 'Mehmonxonalar turi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoteltype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
