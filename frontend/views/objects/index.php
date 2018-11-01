<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ObjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Turistik joylar');
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="two" class="spotlights">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_view',
                'summary'=>'',
    ]) ?>

    <?php Pjax::end(); ?>
</section>
