<?php

use yii\helpers\Url;
use yii\helpers\Html;

if(Yii::$app->language == 'uz')
    {
        $name = $model->full_name_uz;
    }
else if(Yii::$app->language == 'ru')
    {
        $name = $model->full_name_ru;
    }
else if(Yii::$app->language == 'en')
    {
        $name = $model->full_name_en;
    }
else
    {
        $query = null;
    }
$url = Yii::$app->homeUrl;
?>



<div class="col-md-6 col-lg-3 ftco-animate">
	<div style="background-color: #fff;">
		<?= Html::a('', $url.$model->pic, ['class' => 'block-20', 'style' => 'background-image: url('.$url.$model->pic.')']);?>
		<div style="padding: 5px 15px;">
			<h3 class="heading"><?= $name;?></h3>
			<div class="meta">
				<div><?= $model->phone;?></div>
				<div><?= $model->email;?></div>
			</div>
			<div class="meta">
				<?php foreach ($model->languages as $model->language_id) {
					var_dump($model->language_id);
					var_dump($model->lang->language_code);
				} ?>
					<?= var_dump($model->lang->language_code);?>
					<!-- <img style="width: 15%;" src="<?= $url.'images/flags/'.$model->lang->language_code.'.gif';?>"><?= $model->lang->iso;?> -->
			</div>
		</div>
	</div>
</div>