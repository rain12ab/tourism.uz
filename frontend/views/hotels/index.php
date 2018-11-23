<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ListView;
use frontend\widgets\RightSidebarWidget;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ObjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mehmonxonalar');
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 style="color: green" class="mb-3"><?= Yii::t('app', 'Dollar kursi').': 1$ - '.$currency->value.' '.Yii::t('app', 'so\'m');?></h1>
                <?php Pjax::begin(['enablePushState' => false]); ?>
                <?= $this->render('_search', ['model' => $searchModel]); ?>
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'itemOptions' => ['tag' => false],
                    'options' => ['class' => 'row', 'id' => false],
                    'summary'=>'',
                ]) ?>
                <?php Pjax::end(); ?>
            </div>
            <?= RightSidebarWidget::widget();?>
        </div>
    </div>
</section>
