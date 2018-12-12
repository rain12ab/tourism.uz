<?php

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>
<div class="col-lg-6">
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
						<ul class="list-unstyled">
							<li><i class="fas fa-user"></i> Yulduzlar: <?= $model->stars;?></li>
							<li><i class="fas fa-map-marker-alt"></i> Joylashuvi: <?= $model->district->name_uz;?></li>
							<li><i class="fas fa-phone"></i> Tel.raqam: +<?= $model->phone;?></li>
							<li><i class="far fa-envelope"></i> Email: <?= $model->email;?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>