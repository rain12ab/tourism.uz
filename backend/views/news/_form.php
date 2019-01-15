<?php

use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\datecontrol\DateControl;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\News */
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
                        <?= $form->field($model, 'content_uz')->widget(TinyMce::className(), [
                            'options' => ['rows' => 12],
                            'language' => 'ru',
                            'clientOptions' => [
                             'force_br_newlines' => true,
                             'force_p_newlines' => false,
                             'forced_root_block' => '',
                             'file_picker_callback' => new JsExpression("function(cb, value, meta) {
                                var input = document.createElement('input');
                                input.setAttribute('type', 'file');
                                input.setAttribute('accept', 'image/*');
                                input.onchange = function() {
                                var file = this.files[0];

                                var reader = new FileReader();
                                reader.onload = function () {
                                 // Note: Now we need to register the blob in TinyMCEs image blob
                                 // registry. In the next release this part hopefully won't be
                                 // necessary, as we are looking to handle it internally.
                                 var id = 'blobid' + (new Date()).getTime();
                                 var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                                 var base64 = reader.result.split(',')[1];
                                 var blobInfo = blobCache.create(id, file, base64);
                                 blobCache.add(blobInfo);

                                 // call the callback and populate the Title field with the file name
                                 cb(blobInfo.blobUri(), { title: file.name });
                                };
                                reader.readAsDataURL(file);
                                };

                                input.click();
                                }"),
                             'plugins' => [
                                 "advlist autolink lists link charmap print preview anchor",
                                 "searchreplace visualblocks code fullscreen",
                                 "insertdatetime media table contextmenu paste image imagetools"
                             ],
                             
                             'menubar'=> ["insert"],
                             'automatic_uploads' => true,
                             'file_picker_types'=> 'image',
                             
                             'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image imageupload | fontselect | cut copy paste"
                            ]
                        ]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'content_ru')->widget(TinyMce::className(), [
                            'options' => ['rows' => 12],
                            'language' => 'ru',
                            'clientOptions' => [
                             'force_br_newlines' => true,
                             'force_p_newlines' => false,
                             'forced_root_block' => '',
                             'file_picker_callback' => new JsExpression("function(cb, value, meta) {
                                var input = document.createElement('input');
                                input.setAttribute('type', 'file');
                                input.setAttribute('accept', 'image/*');
                                input.onchange = function() {
                                var file = this.files[0];

                                var reader = new FileReader();
                                reader.onload = function () {
                                 // Note: Now we need to register the blob in TinyMCEs image blob
                                 // registry. In the next release this part hopefully won't be
                                 // necessary, as we are looking to handle it internally.
                                 var id = 'blobid' + (new Date()).getTime();
                                 var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                                 var base64 = reader.result.split(',')[1];
                                 var blobInfo = blobCache.create(id, file, base64);
                                 blobCache.add(blobInfo);

                                 // call the callback and populate the Title field with the file name
                                 cb(blobInfo.blobUri(), { title: file.name });
                                };
                                reader.readAsDataURL(file);
                                };

                                input.click();
                                }"),
                             'plugins' => [
                                 "advlist autolink lists link charmap print preview anchor",
                                 "searchreplace visualblocks code fullscreen",
                                 "insertdatetime media table contextmenu paste image imagetools"
                             ],
                             
                             'menubar'=> ["insert"],
                             'automatic_uploads' => true,
                             'file_picker_types'=> 'image',
                             
                             'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image imageupload | fontselect | cut copy paste"
                            ]
                        ]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'content_en')->widget(TinyMce::className(), [
                            'options' => ['rows' => 12],
                            'language' => 'ru',
                            'clientOptions' => [
                             'force_br_newlines' => true,
                             'force_p_newlines' => false,
                             'forced_root_block' => '',
                             'file_picker_callback' => new JsExpression("function(cb, value, meta) {
                                var input = document.createElement('input');
                                input.setAttribute('type', 'file');
                                input.setAttribute('accept', 'image/*');
                                input.onchange = function() {
                                var file = this.files[0];

                                var reader = new FileReader();
                                reader.onload = function () {
                                 // Note: Now we need to register the blob in TinyMCEs image blob
                                 // registry. In the next release this part hopefully won't be
                                 // necessary, as we are looking to handle it internally.
                                 var id = 'blobid' + (new Date()).getTime();
                                 var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                                 var base64 = reader.result.split(',')[1];
                                 var blobInfo = blobCache.create(id, file, base64);
                                 blobCache.add(blobInfo);

                                 // call the callback and populate the Title field with the file name
                                 cb(blobInfo.blobUri(), { title: file.name });
                                };
                                reader.readAsDataURL(file);
                                };

                                input.click();
                                }"),
                             'plugins' => [
                                 "advlist autolink lists link charmap print preview anchor",
                                 "searchreplace visualblocks code fullscreen",
                                 "insertdatetime media table contextmenu paste image imagetools"
                             ],
                             
                             'menubar'=> ["insert"],
                             'automatic_uploads' => true,
                             'file_picker_types'=> 'image',
                             
                             'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image imageupload | fontselect | cut copy paste"
                            ]
                        ]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'pic')->widget(FileInput::classname(), [
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
                    <div class="col-md-6">
                        <?= $form->field($model, 'date')->widget(DateControl::classname(), [
                            'type'=>DateControl::FORMAT_DATE,
                            'displayFormat' => 'php:d/m/Y',
                            'saveFormat' => 'php:d/m/Y',
                            'language' => 'ru',
                        ]); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
