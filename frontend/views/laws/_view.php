<?php 

use yii\helpers\Url;


if(Yii::$app->language == 'uz'){
    $name = $model->name_uz;
    $url = $model->url_uz;
} 
else if(Yii::$app->language == 'ru'){
    $name = $model->name_ru;
    $url = $model->url_ru;
} 
else
{
    null;
}

?>

<style type="text/css">
	#p-4{
		background-color: #fff;
		border: 1px solid #000;
		border-radius: 10px;
	}
</style>

<div class="col-md-12 ftco-animate">
	<div style="padding: 10px; margin: 5px;" id="p-4">
			<h4 class="heading"><a target="_blank" href="<?= Url::to($url);?>"><?= $name;?></a></h4>
	</div>
</div>