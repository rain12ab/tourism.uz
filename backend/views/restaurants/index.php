<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\HotelsSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ovqatlanish maskanlari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Qo\'shish', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>
        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'summary' => '',
            'itemOptions' => ['tag' => false],
            'options' => ['class' => 'row', 'id' => false],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
