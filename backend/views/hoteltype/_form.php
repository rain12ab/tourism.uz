<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hoteltype */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="form-group">
    <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>