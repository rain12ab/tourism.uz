<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Yangiliklar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="probootstrap-section">
    <div class="container">
        <div class="col-md-12">
        <?php Pjax::begin(); ?>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'summary' => '',
        ]) ?>
        <?php Pjax::end(); ?>
        </div>
    </div>
</div>
