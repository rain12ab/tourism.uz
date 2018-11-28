<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AboutSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Boshqarma haqida';
$this->params['breadcrumbs'][] = ['label' => 'Boshqarma ma\'lumotlari', 'url' => ['selector'], 'data-pjax' => '0',];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create About', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::end(); ?>
</div>
