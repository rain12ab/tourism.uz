<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContactsSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aloqa ma\'lumotlari';
$this->params['breadcrumbs'][] = ['label' => 'Boshqarma ma\'lumotlari', 'url' => ['about/selector'], 'data-pjax' => '0',];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">
    <?php Pjax::begin(); ?>
    <p>
        <?= Html::a('O\'zgartirish', ['update', 'id' => 1], ['class' => 'btn btn-primary']) ?>
    </p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="card-title"><?= $this->title;?></h2>
                </div>
                <div class="card-body">
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_contact',
                        'summary' => '',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>


    <?php Pjax::end(); ?>
</div>
