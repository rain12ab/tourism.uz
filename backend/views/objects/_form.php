<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Hotels */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Turistik obyekt kiritish</h2>
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
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'popular')->dropDownList(['1' => 'Taniqli', '0' => 'Taniqli emas'], ['prompt' => '', 'style' => 'color: #e14eca;',]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'district_id')->dropDownList(ArrayHelper::map(common\models\Hotels::getListdistrict(), 'id', 'name'), ['prompt' => 'Joylashuvini tanlang', 'style' => 'color: #e14eca;',]);?>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin: 10px 0;" class="col-md-12">
                            <?= $form->field($model, 'content_uz')->widget(TinyMce::className(), [
                                'options' => ['rows' => 6],
                                'language' => 'ru',
                                'clientOptions' => [
                                    'plugins' => [
                                        "advlist autolink lists link charmap print preview anchor",
                                        "searchreplace visualblocks code fullscreen",
                                        "insertdatetime media table contextmenu paste textcolor colorpicker"
                                    ],
                                    'toolbar' => "undo redo | fontselect fontsizeselect styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fullscreen | forecolor backcolor"
                                ]
                            ]);?>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin: 10px 0;" class="col-md-12">
                            <?= $form->field($model, 'content_ru')->widget(TinyMce::className(), [
                                'options' => ['rows' => 6],
                                'language' => 'ru',
                                'clientOptions' => [
                                    'plugins' => [
                                        "advlist autolink lists link charmap print preview anchor",
                                        "searchreplace visualblocks code fullscreen",
                                        "insertdatetime media table contextmenu paste textcolor colorpicker"
                                    ],
                                    'toolbar' => "undo redo | fontselect fontsizeselect styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fullscreen | forecolor backcolor"
                                ]
                            ]);?>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin: 10px 0;" class="col-md-12">
                            <?= $form->field($model, 'content_en')->widget(TinyMce::className(), [
                                'options' => ['rows' => 6],
                                'language' => 'ru',
                                'clientOptions' => [
                                    'plugins' => [
                                        "advlist autolink lists link charmap print preview anchor",
                                        "searchreplace visualblocks code fullscreen",
                                        "insertdatetime media table contextmenu paste textcolor colorpicker"
                                    ],
                                    'toolbar' => "undo redo | fontselect fontsizeselect styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fullscreen | forecolor backcolor"
                                ]
                            ]);?>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin: 10px 0;" class="col-md-6">
                            <?= $form->field($model, 'lat')->textInput() ?>
                        </div>
                        <div style="margin: 10px 0;" class="col-md-6">
                            <?= $form->field($model, 'lng')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'pic_main')->widget(FileInput::classname(), [
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
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'pictures[]')->widget(FileInput::classname(), [
                                'options' => [
                                    'accept' => 'image/*',
                                    'multiple' => true,
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
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>
