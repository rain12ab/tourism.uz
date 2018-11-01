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

<div style="margin: 15px 15px" class="row">
	<div class="col-md-3">
		<img class="img-border" style="width: 100%;" src="<?= Yii::$app->request->baseUrl;?>/<?= $model->pic;?>">
	</div>
	<div class="col-md-8">
		<a href="<?= Url::to(['news/view', 'id' => $model->id]);?>"><h2 class="mt0"><?= $title;?></h2></a>
		<ul style="margin-bottom: -12px;" class="with-icon colored"><li><i class="fas fa-clock"></i><span style="font-size: 14px;"><?= $model->date;?></span></li></ul>
		<p>
			<?= StringHelper::truncate($content, 200);?>
		</p>
	</div>
</div>