<?php

use yii\helpers\Url;
use frontend\widgets\MessageWidget;

if(Yii::$app->language == 'uz')
  {
    $content = $model->content_uz;
  }
else if(Yii::$app->language == 'ru')
  {
    $content = $model->content_ru;
  }
else if(Yii::$app->language == 'en')
  {
    $content = $model->content_en;
  }
else
  {
    $content = null;    
  }

$url = Yii::$app->homeUrl;

?>

<div class="row ftco-animate">
	<div class="col-md-12 text-center heading-section ftco-animate fadeInUp ftco-animated">
		<h1 class="mb-3" style="text-align: center;"><?= Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');?></h1>
	</div>
</div>
<div class="row ftco-animate">
	<div class="col-md-6 ftco-animate">
		<p style="color: #000;"><?= $content;?></p>
	</div>
	<div class="col-md-6">

		<?php
		for ($i=0; $i < count($model->pics); $i++) { 
			$items[$i]['url'] = $url.$model->pics[$i];
			$items[$i]['src'] = $url.$model->pics[$i];
		}
		?>
		<?= dosamigos\gallery\Carousel::widget([
		    'items' => $items,
		    'showControls' => false,
		]);
		?> 
	</div>
</div>