<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Biz bilan aloqa');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="ftco-section contact-section">
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
