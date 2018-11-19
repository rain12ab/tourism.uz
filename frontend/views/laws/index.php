<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
// use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LawsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Qonunchilik');
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="ftco-section">
    <div class="container">
        <?php Pjax::begin(); ?>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'summary' => '',
        ]) ?>
        <?php Pjax::end(); ?>
    </div>
</section>