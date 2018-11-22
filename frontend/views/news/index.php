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
<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
        	<div class="col-md-12">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'summary' => '',
                ]) ?>
            </div>
        </div>
    </div>
</section>
