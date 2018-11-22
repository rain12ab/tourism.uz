<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AboutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Boshqarma haqida');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="ftco-section">
  <div class="container">
        <div class="col-md-12">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_about',
            'summary' => '',
        ]) ?>
        <?= ListView::widget([
            'dataProvider' => $dataProvider2,
            'itemView' => '_contact',
            'summary' => '',
        ]) ?>
        </div>
    </div>
</section>
