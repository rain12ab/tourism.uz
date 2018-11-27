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

$language = common\models\Country::find()->where(['id' => $model->languages])->asArray()->all();

?>



<div class="col-md-6 col-lg-3">
	<div style="background-color: #fff;">
		<?= Html::a('', $url.$model->pic, ['class' => 'block-20', 'style' => 'background-image: url('.$url.$model->pic.')']);?>
		<div style="padding: 5px 15px;">
			<h3 class="heading"><?= $name;?></h3>
			<div class="meta">
				<div><?= $model->phone;?></div>
				<div><?= $model->email;?></div>
			</div>
			<div class="meta">
				<?php foreach ($language as $l): ?>
					<img style="width: 15%; padding: 5px 5px;" src="<?= $url.'images/flags/'.$l['language_code'].'.gif';?>"><span style="text-transform: uppercase;"><?= $l['language_code'];?></span>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>