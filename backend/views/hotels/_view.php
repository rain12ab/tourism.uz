<?php

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>
<div class="col-lg-4">
	<a href="<?= Url::to(['hotels/view', 'id' => $model->id]);?>">
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
						<span><i class="fas fa-user"></i> Yulduzlar: <?= $model->stars;?></span><br>
						<span><i class="fas fa-map-marker-alt"></i> Joylashuvi: <?= $model->district->name_uz;?></span><br>
						<span><i class="fas fa-phone"></i> Tel.raqam: +<?= $model->phone;?></span><br>
						<span><i class="far fa-envelope"></i> Email: <?= $model->email;?></span><br>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>