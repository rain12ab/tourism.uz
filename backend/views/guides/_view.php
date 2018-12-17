<?php

use yii\helpers\StringHelper;
use yii\helpers\Url;

$url = Yii::$app->homeUrl.'../';
$language = common\models\Country::find()->where(['id' => $model->languages])->asArray()->all();
?>
<div class="col-lg-6">
	<a href="<?= Url::to(['guides/view', 'id' => $model->id]);?>">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><?= $model->full_name_uz;?></h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<img style="width: 100%;" src="<?= Yii::$app->homeUrl.'../'.$model->pic;?>">
					</div>
					<div class="col-md-6">
						<ul class="list-unstyled">
							<li><i class="fas fa-language"></i> Tillar:
							<?php foreach ($language as $l): ?>
								 <img style="width: 15%; padding: 5px 5px;" src="<?= $url.'images/flags/'.$l['language_code'].'.gif';?>"><span style="text-transform: uppercase;"><?= $l['language_code'];?></span>
							<?php endforeach ?></li>
							<li><i class="fas fa-phone"></i> Tel.raqam: +<?= $model->phone;?></li>
							<li><i class="far fa-envelope"></i> Email: <?= $model->email;?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>