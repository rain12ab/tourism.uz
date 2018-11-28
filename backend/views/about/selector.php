<?php

use yii\helpers\Url;
use yii\helpers\Html;


$this->title = 'Boshqarma ma\'lumotlari';
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
		<a id="selector" href="<?= Url::to(['about/index']);?>">
			<div id="obj" class="btn card">
				<div class="card-body">
					<h4 id="name">Boshqarma haqida</h4>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?= Url::to(['contacts/index']);?>">
			<div id="obj" class="btn card">
				<div class="card-body">
					<h4 id="name">Aloqa ma'lumotlari</h4>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?= Url::to(['team/index']);?>">
			<div id="obj" class="btn card">
				<div class="card-body">
					<h4 id="name">Boshqarma tuzilmasi</h4>
				</div>
			</div>
		</a>
	</div>
</div>
