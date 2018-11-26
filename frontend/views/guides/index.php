<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\GuidesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Guides');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="ftco-section bg-light">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php Pjax::begin(); ?>
                <?= $this->render('_search', ['model' => $searchModel]); ?>
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'summary' => '',
                ]) ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</section>
