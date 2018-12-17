<?php

use yii\helpers\Html;
use yii\helpers\Arrayhelper;
use yii\widgets\ActiveForm;
use dosamigos\croppie\CroppieWidget;
use yii\bootstrap4\Modal;
use kartik\select2\Select2;
use yii\web\JsExpression;



$url = \Yii::$app->homeUrl.'../images/flags/';
$format = <<< SCRIPT
function format(state) {
    if (!state.id) return state.text; // optgroup
    src = '$url' +  state.text+ '.gif';
    return '<img style="width:30px; height:20px;" src="' + src + '"/> ' + state.text.split('.')[0];
}
SCRIPT;
$escape = new JsExpression("function(m) { return m; }");
$this->registerJs($format, yii\web\View::POS_HEAD);


/* @var $this yii\web\View */
/* @var $model common\models\Guides */
/* @var $form yii\widgets\ActiveForm */
$data = common\models\Country::find()->select(['id', 'language_code'])->asArray()->all();
$count = common\models\Country::find()->select(['id', 'language_code'])->count();
// var_dump($data).'<br>';
for ($i=0; $i > $count; $i++) { 
    $data[$i] = $data[id];
    unset($data[$i][$i]);

}



$data = Arrayhelper::map($data, 'id', 'language_code');
$data = array_filter($data);
?>
<style type="text/css">
	.select2-results__option, .select2-selection__choice{
		text-transform: uppercase;
	}
</style>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title"><?= $this->title;?></h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<?= $form->field($model, 'full_name_uz')->textInput() ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $form->field($model, 'full_name_ru')->textInput() ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $form->field($model, 'full_name_en')->textInput() ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<?= $form->field($model, 'phone')->textInput() ?>
					</div>
					<div class="col-md-6">
						<?= $form->field($model, 'email')->textInput() ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $form->field($model, 'languages', ['inputOptions' => ['style' => 'text-transform: uppercase;']])->widget(Select2::classname(), [
			                'data' =>$data,
			                'language' => 'ru',
			                'size' => Select2::LARGE,
			                'options' => ['placeholder' => Yii::t('app', 'Tanlash').'...'],
			                'pluginOptions' => [
						        'templateResult' => new JsExpression('format'),
						        'templateSelection' => new JsExpression('format'),
						        'escapeMarkup' => $escape,
						        'allowClear' => true,
						        'multiple' => true,
						    ],
			            ]); ?>
					</div>
				</div>
				<?php Modal::begin([
                    'toggleButton' => ['label' => 'Rasm yuklash', 'class' => 'btn btn-primary'],
                    'size' => 'modal-lg',
                ]);?>
                <div class="row">
                    <div class="col-md-12">
                        <?= \alvinux\imagecropper\Cropper::widget([
                            'model' => $model,
                            'attribute' => 'pic',
                            'autoCrop' => false,
                            'options' => [
                                ['width' => 300,'height' => 300],
                            ],
                        ]); ?>                
                    </div>
                </div>
                <?php Modal::end();?>
                <div class="form-group">
			        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
			    </div>
			</div>

<?php ActiveForm::end(); ?>