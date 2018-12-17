<?php

use yii\helpers\Url;
use yii\helpers\Html;


$this->title = 'Mehmonxonalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
	#obj {
		padding: 10vh;
	}
	#name {
		text-align: center;
		text-transform: uppercase;
	}
</style>

<div class="row">
	<div class="col-md-6">
		<a id="selector" href="<?= Url::to(['restaurants/index']);?>">
			<div id="obj" class="btn card">
				<div class="card-body">
					<h4 id="name">Ovqatlanish maskanlari</h4>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-6">
		<a href="<?= Url::to(['restype/index']);?>">
			<div id="obj" class="btn card">
				<div class="card-body">
					<h4 id="name">Ovqatlanish maskanlari turlari</h4>
				</div>
			</div>
		</a>
	</div>
</div>
