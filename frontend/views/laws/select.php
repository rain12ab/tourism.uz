<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Normativ-hujjatlar');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
	<div style="margin: 50px 0;" class="row">
		<div class="col-md-12">
			<?= Html::a(Yii::t('app', 'Qidirish'), Url::to(['laws/index']), ['class' => 'btn btn-success', 'style' => 'margin-bottom: 50px;']);?>
			<div class="categories">
		      <?php foreach($types as $type):?>
		        <?php if(Yii::$app->language == 'uz')
		            {
		                $name = $type->name_uz;
		            }
		        else if(Yii::$app->language == 'ru')
		            {
		                $name = $type->name_ru;
		            }
		        else
		            {
		                $name = null;
		            }
		        ?>
		        <li style="font-size: 24px;"><a href="<?= Url::to(['laws/index', 'type' => $type->id]);?>"><?= $name;?><span><?= common\models\Laws::find()->where(['lawtype_id' => $type->id])->count();?></span></a></li>
		      <?php endforeach?>
		    </div>
	    </div>
    </div>
</div>