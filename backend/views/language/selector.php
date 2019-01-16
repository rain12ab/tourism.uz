<?php

use yii\helpers\Url;
use yii\helpers\Html;


$this->title = 'Tillar';
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
	<div class="col-md-4">
		<a id="selector" href="<?= Url::to(['language/index']);?>">
			<div id="obj" class="btn card">
				<div class="card-body">
					<h4 id="name">Tillar</h4>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?= Url::to(['source-message/index']);?>">
			<div id="obj" class="btn card">
				<div class="card-body">
					<h4 id="name">Asosiy frazalar</h4>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?= Url::to(['message/index']);?>">
			<div id="obj" class="btn card">
				<div class="card-body">
					<h4 id="name">Tarjimalar</h4>
				</div>
			</div>
		</a>
	</div>
</div>
