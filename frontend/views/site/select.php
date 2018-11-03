<?php

use yii\helpers\Url;

$this->title = Yii::t('app', 'Sayyohlarga');
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
.img-bg{
	-webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
	-moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
	box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
}
.probootstrap-photo-details{
	background-color: #00000080;
    padding: 10px;
}
</style>


<section class="probootstrap-section">
    <div class="container">
		<div class="row probootstrap-gutter16">
	        <div class="col-md-3 probootstrap-animate" data-animate-effect="fadeIn">
	          <a href="<?= Url::to(['objects/index']);?>" class="img-bg" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/images/bg/6.jpg);">
	            <div class="probootstrap-photo-details">
	              <h2><?= Yii::t('app', 'Turistik obyektlar');?></h2>
	              <p><?= Yii::t('app', 'Arxitekturik, arxeologik<br>va tabiat joylar');?></p>
	            </div>
	          </a>
	        </div>
	        <div class="col-md-3 probootstrap-animate" data-animate-effect="fadeIn">
	          <a href="<?= Url::to(['hotels/index']);?>" class="img-bg" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/images/bg/11.jpeg);">
	            <div class="probootstrap-photo-details">
	              <h2><?= Yii::t('app', 'Mehmonxonalar');?></h2>
	              <p><?= Yii::t('app', 'Motellar, uymehmonxonalari v.h.k.');?></p>
	            </div>
	          </a>
	        </div>
	        <div class="col-md-3 probootstrap-animate" data-animate-effect="fadeIn">
	          <a href="<?= Url::to(['hotels/index']);?>" class="img-bg" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/images/bg/3.jpg);">
	            <div class="probootstrap-photo-details">
	              <h2><?= Yii::t('app', 'Ovqatlanish maskanlari');?></h2>
              	  <p><?= Yii::t('app', 'Choyxonlar, restoranlar, kafe v.h.k.');?></p>
	            </div>
	          </a>
	        </div>
	        <div class="col-md-3 probootstrap-animate" data-animate-effect="fadeIn">
	          <a href="<?= Url::to(['hotels/index']);?>" class="img-bg" style="background-image: url(<?= Yii::$app->request->baseUrl;?>/images/bg/8.jpg);">
	            <div class="probootstrap-photo-details">
	              <h2><?= Yii::t('app', 'Gidlar');?></h2>
	              <p><?= Yii::t('app', 'Yo\'l boshlovchilar, tarjimonlar');?></p>
	            </div>
	          </a>
	        </div>
      	</div>
    </div>
</section>
