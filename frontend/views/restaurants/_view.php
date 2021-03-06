<?php

use yii\helpers\Url;



if(Yii::$app->language == 'uz')
	{
		$name = $model->name_uz;
		$type = $model->type->name_uz;
		$district = $model->district->name_uz;
	}
else if(Yii::$app->language == 'ru')
	{
		$name = $model->name_ru;
		$type = $model->type->name_ru;
		$district = $model->district->name_ru;
	}
else if(Yii::$app->language == 'en')
	{
		$name = $model->name_en;
		$type = $model->type->name_en;
		$district = $model->district->name_en;
	}
else
	{
		$name = null;
		$type = null;
		$district = null;
	}

?>

<div class="col-md-6 col-lg-6">
	<a href="<?= Url::to(['restaurants/view', 'id' => $model->id]);?>" class="block-5" style="background-image: url(<?= Yii::$app->homeUrl.$model->pic_main;?>);">
		<div class="text">
			<h3 class="heading"><?= $name;?></h3>
			<div class="post-meta">
				<span><?= $district?></span>
			</div>
		</div>
	</a>
</div>