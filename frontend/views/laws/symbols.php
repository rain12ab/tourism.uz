<?php

use yii\helpers\Url;
use hosanna\audiojs\AudioJs;

$this->title = Yii::t('app', 'Davlat ramzlari');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qonunchilik'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
@media screen and (max-width: 991px) {
  .col-md-offset-3 {
  		margin-left: 8%;
  }
}
  @media (min-width: 992px) {
   .col-md-offset-3 {
    	margin-left: 29%;
}
</style>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
	    		<?php foreach($symbols as $symbol):?>
	    			<?php if(Yii::$app->language == 'uz')
						{
							$name = $symbol->name_uz;
							$content = $symbol->content_uz;
						}
					else if(Yii::$app->language == 'ru')
						{
							$name = $symbol->name_ru;
							$content = $symbol->content_ru;
						}
					else if(Yii::$app->language == 'en')
						{
							$name = $symbol->name_en;
							$content = $symbol->content_en;
						}
					else
						{
							$name = null;
							$content = null;
						}
					?>
	    			<h1 style="text-align: center; margin-bottom: 30px;"><b><?= $name;?></b></h1>
	    				<?php if($symbol->id == 3){?>
	    					<div style="margin-bottom: 50px;" class="row">
	    						<div class="col-md-offset-3">
	    					<?= AudioJs::widget([
							    'files'=> '../'.Yii::$app->request->baseUrl.'/'.$symbol->file,
							]);?>
	    					</div>
		    					</div>
	    				<?php } else { ?>
	    					<div style="margin-bottom: 50px;" class="row">
	    						<div class="col-md-4 col-md-offset-4">
		    						<img style="width: 100%;" src="<?= Yii::$app->request->baseUrl;?>/<?= $symbol->file;?>">
		    					</div>
		    					</div>
    				  <?php }?>
    				  <div class="row">
    				  	<div style="margin-bottom: 30px;" class="col-md-12">
	    					<p style="text-align: justify;"><?= $content;?></p>
	    				</div>
	    				</div>
	    		<?php endforeach?>
			</div>
		</div>
	</div>
</section>