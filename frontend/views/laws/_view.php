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

<div class="col-md-12 col-lg-6 ftco-animate">
	<div class="blog-entry">
		<a href="<?= Url::to(['news/view', 'id' => $model->id]);?>" class="block-20" style="background-image: url('<?= Yii::$app->request->baseUrl;?>/<?= $model->pic;?>');">
		</a>
		<div class="text p-4">
			<div class="meta">
				<div><?= $model->date;?></div>
			</div>
			<h4 class="heading"><a href="<?= Url::to(['news/view', 'id' => $model->id]);?>"><?= $title;?></a></h4>
			<p class="clearfix">
			<a href="<?= Url::to(['news/view', 'id' => $model->id]);?>" class="float-left"><?= Yii::t('app', 'Batafsil');?></a>
			</p>
		</div>
	</div>
</div>