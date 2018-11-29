<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AboutSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Boshqarma haqida';
$this->params['breadcrumbs'][] = ['label' => 'Boshqarma ma\'lumotlari', 'url' => ['selector'], 'data-pjax' => '0',];
$this->params['breadcrumbs'][] = $this->title;
$url = Yii::$app->homeUrl.'../';
?>
<div class="about-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php foreach ($datas as $data):?>
    <p>
    	<?= Html::a('Ma\'lumotlarni o\'zgartirish', ['update', 'id' => $data->id], ['class' => 'btn btn-primary']) ?>
    </p>
    	<div class="row">
    		<div class="col-md-6">
	            <div class="card">
					<div class="card-header card-header-tabs">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h2 class="card-title">Boshqarma haqida</h2>
							    <ul class="nav nav-tabs justify-content-center" data-tabs="tabs">
							      <li class="nav-item">
							        <a class="nav-link active" href="#uz" data-toggle="tab">
							          O'zbekcha
							          <div class="ripple-container"></div>
							        </a>
							      </li>
							      <li class="nav-item">
							        <a class="nav-link" href="#ru" data-toggle="tab">
							          Ruscha
							          <div class="ripple-container"></div>
							        </a>
							      </li>
							      <li class="nav-item">
							        <a class="nav-link" href="#en" data-toggle="tab">
							          Inglizcha
							          <div class="ripple-container"></div>
							        </a>
							      </li>
							    </ul>
							</div>
						</div>
					</div>
	              <div class="card-body">
	                <div class="tab-content">
					  <div class="tab-pane active" id="uz">
					    <p style="padding: 3vh;"><?= $data->content_uz;?></p>
					  </div>
					  <div class="tab-pane" id="ru">
					    <p style="padding: 3vh;"><?= $data->content_ru;?></p>
					  </div>
					  <div class="tab-pane" id="en">
					    <p style="padding: 3vh;"><?= $data->content_en;?></p>
					  </div>
	                </div>
	              </div>
	            </div>
    		</div>
    		<div class="col-md-6">
	            <div class="card">
					<div class="card-header">
						<h2 class="card-title">Rasmlar</h2>
					</div>
					<div class="card-body">
						<div class="row">
							<?php for ($i=0; $i < count($data->pics); $i++):?>
				                <div style="padding: 1vh;" class="col-md-4">
				                    <?= Html::a(Html::img($url.$data->pics[$i], ['class' => 'img-fluid', 'style' => 'width: 100%;']), $url.$data->pics[$i], ['rel' => 'fancybox']);?>
				                    <?= Html::a('O\'chirish', ['deletepic', 'id' => $i], [
							            'class' => 'btn btn-danger text-center',
							            'data' => [
							                'confirm' => 'Aniqmi?',
							                'method' => 'post',
							            ],
							        ]) ?>
				                </div>
				            <?php endfor?>
						</div>
					</div>
				</div>
			</div>
    	</div>
    <?php endforeach;?>
    <?php Pjax::end(); ?>
</div>
