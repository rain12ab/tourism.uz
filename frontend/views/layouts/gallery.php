<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\GalleryAsset;
use frontend\assets\AwesomeAsset;
use frontend\models\BreadcrumbsMicrodata;

// Yii::$app->name = Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');
// $this->title = Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');

GalleryAsset::register($this);
AwesomeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="is-preload-0 is-preload-1 is-preload-2">
<?php $this->beginBody() ?>
		<!-- Main -->
<div id="main">

		<?= $content;?>

	<!-- Footer -->
		<footer id="footer">
			<ul class="copyright">
				<li style="padding: 10px 0;">&copy; <?= Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');?>.</li>
				<li style="padding: 10px 0;"><?= Yii::t('app', 'Ma\'lumotlardan foydalanilganda www.navoitourism.uz ga havola ko\'rsatilishi shart.');?></li>
			</ul>
		</footer>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
