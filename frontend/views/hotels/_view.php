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

$result = Yii::$app->runAction('hotels/calculate', ['sum' => $model->price]);
?>

<div style="padding: 10px;" class="col-md-6 col-lg-6">
	<a href="<?= Url::to(['hotels/view', 'id' => $model->id]);?>" class="block-5" style="background-image: url(<?= Yii::$app->homeUrl.$model->pic_main;?>);">
		<div class="text">
			<h3 class="heading"><?= $name;?></h3>
			<span class="price"><?= round($result[0], 2).'$/'.Yii::t('app', 'bir kecha');?></span><br>
			<span class="price"><?= round($result[1], 2).'€/'.Yii::t('app', 'bir kecha');?></span><br>
			<span class="price"><?= $model->price.' '.Yii::t('app', 'so\'m').'/'.Yii::t('app', 'bir kecha');?></span>
			<div class="post-meta">
				<span><?= $district?></span>
			</div>
			<p class="star-rate">
				<?php for($i=0; $i < $model->stars; $i++):?>
					<span class="icon-star"></span>
				<?php endfor?>
			</p>
		</div>
	</a>
</div>