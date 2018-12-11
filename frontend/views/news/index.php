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
<div style="margin: 20px auto;" class="container">
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
