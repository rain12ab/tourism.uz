<?php

use yii\helpers\StringHelper;
use yii\helpers\Url;

if ($model->popular == 1) {
	$popular = "Taniqli";
}
else{
	$popular = "Taniqli emas";
}


?>
<div class="col-lg-6">
	<a href="<?= Url::to(['objects/view', 'id' => $model->id]);?>">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><?= $model->name_uz;?></h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<img style="width: 100%;" src="<?= Yii::$app->homeUrl.'../'.$model->pic_main;?>">
					</div>
					<div class="col-md-6">
						<ul class="list-unstyled">
							<li><i class="fas fa-map-marker-alt"></i> Joylashuvi: <?= $model->district->name_uz;?></li>
							<li><i class="fas fa-phone"></i> Mashhurligi: <?= $popular;?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>