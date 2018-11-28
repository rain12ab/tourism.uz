<?php

use yii\helpers\Url;

$url = Yii::$app->homeUrl;

if (Yii::$app->language == 'uz') {
	$title = $model->title_uz;
}
else if (Yii::$app->language == 'ru') {
	$title = $model->title_ru;
}
else if (Yii::$app->language == 'en') {
	$title = $model->title_en;
}
else {
	$title = null;
}
?>

        <a class="thumbnail" href="<?= $url.$model->url;?>" data-position="left center"><img style="width: 20%;" src="<?= $url.$model->url;?>" alt="" /></a>
        <p><?= $title;?></p>

