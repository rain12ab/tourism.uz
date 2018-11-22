<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
// use yii\widgets\ListView;
// use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LawsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Normativ-hujjatlar bazasi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qonunchilik'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="ftco-section">
    <div class="container">
    	<h1 style="text-align: center; margin-bottom: 30px;"><?= Yii::t('app', 'Ma\'lumotlar manbasi').': ';?><a href="http://lex.uz">Lex.uz</a></h1>
        <?php Pjax::begin(['enablePushState' => false]); ?>
        	<?= $this->render('_search', ['model' => $searchModel]); ?>
        	<?php if(Yii::$app->request->queryParams != null):?>
	        <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'summary' => '',
		        'showHeader'=> false,
		        'options' => ['style' => 'font-size: 16px;'],
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            [
		            	'value'=> function($model){
                    		if(Yii::$app->language == 'uz'){
							    $name = $model->name_uz;
							} 
							else if(Yii::$app->language == 'ru'){
							    $name = $model->name_ru;
							} 
							else{
							    null;
							}
							return $name;
                		},
		            ],
		            [
			            'class' => 'yii\grid\ActionColumn',
			            'template' => '{download} {view}',  
			            'buttons' => [
			                'download' => function($url, $model, $key) {
			                	if(Yii::$app->language == 'uz'){
								    $url = $model->url_uz;
								} 
								else if(Yii::$app->language == 'ru'){
								    $url = $model->url_ru;
								} 
								else{
								    null;
								}
			                    return Html::a(Html::tag('i', '', ['class' => 'fas fa-download', 'style' => 'margin-right: 5px;']),$url.'?type=doc');
			                },
			                'view' => function($url, $model, $key) {
			                	if(Yii::$app->language == 'uz'){
								    $url = $model->url_uz;
								} 
								else if(Yii::$app->language == 'ru'){
								    $url = $model->url_ru;
								} 
								else{
								    null;
								}
			                    return Html::a(Html::tag('i', '', ['class' => 'fas fa-eye']),$url);
			                }
			            ]
			        ],

		            // ['class' => 'yii\grid\ActionColumn'],
		        ],
		    ]); ?>
	    	<?php endif?>
        <?php Pjax::end(); ?>
    </div>
</section>