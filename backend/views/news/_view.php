<?php

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>
<div class="col-lg-6">
	<a href="<?= Url::to(['news/view', 'id' => $model->id]);?>">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><?= $model->title_uz;?></h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<img style="width: 100%;" src="<?= Yii::$app->homeUrl.'../'.$model->pic;?>">
					</div>
					<div class="col-md-8">
						<span><i class="fas fa-user"></i> Muallif: <?= $model->author;?></span><br>
						<span><i class="far fa-clock"></i> Sanasi: <?= $model->date;?></span>
						<p><?= StringHelper::truncate($model->content_uz, 100);?></p>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>