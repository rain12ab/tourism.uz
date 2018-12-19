<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;


/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h2 class="card-title"><?= $this->title;?></h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?= $form->field($model, 'turn')->textInput(['maxlength' => true]) ?>
						</div>
					</div>
					<div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'img')->widget(FileInput::classname(), [
                                'options' => [
                                    'accept' => 'image/*',
                                ],
                                'pluginOptions' => [
                                    'initialPreviewAsData'=>true,
                                    'showPreview' => true,
                                    'showCaption' => false,
                                    'showRemove' => true,
                                    'showUpload' => false,
                                ],
                            ]);?>
                        </div>
                    </div>
				    <div class="form-group">
				        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
				    </div>
				</div>
			</div>
		</div>
	</div>
<?php ActiveForm::end(); ?>