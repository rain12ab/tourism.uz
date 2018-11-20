<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
// use yii\widgets\ListView;
// use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LawsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Qonunchilik');
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="ftco-section">
    <div class="container">
        <?php Pjax::begin(); ?>
        	<?= $this->render('_search', ['model' => $searchModel]); ?>
	        <?= GridView::widget([
		        'dataProvider' => $dataProvider,
		        'summary' => '',
		        'showHeader'=> false,
		        'options' => ['style' => 'font-size: 16px;'],
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            [
		            	'value'=> function($model){
                    		if(Yii::$app->session->get('_lang') == 'uz'){
							    $name = $model->name_uz;
							} 
							else if(Yii::$app->session->get('_lang') == 'ru'){
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
			                	if(Yii::$app->session->get('_lang') == 'uz'){
								    $url = $model->url_uz;
								} 
								else if(Yii::$app->session->get('_lang') == 'ru'){
								    $url = $model->url_ru;
								} 
								else{
								    null;
								}
			                    return Html::a(Html::tag('i', '', ['class' => 'fas fa-download', 'style' => 'margin-right: 5px;']),$url.'?type=doc');
			                },
			                'view' => function($url, $model, $key) {
			                	if(Yii::$app->session->get('_lang') == 'uz'){
								    $url = $model->url_uz;
								} 
								else if(Yii::$app->session->get('_lang') == 'ru'){
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
        <?php Pjax::end(); ?>
    </div>
</section>