<?php

use yii\helpers\Url;
use yii\helpers\StringHelper;

if(Yii::$app->language == 'uz')
	{
		$title = $model->title_uz;
		$content = $model->content_uz;
	}
else if(Yii::$app->language == 'ru')
	{
		$title = $model->title_ru;
		$content = $model->content_ru;
	}
else if(Yii::$app->language == 'en')
	{
		$title = $model->title_en;
		$content = $model->content_en;
	}
else
	{
		$title = null;
		$content = null;
	}
?>
<div class="col-md-6 col-lg-3 ftco-animate">
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