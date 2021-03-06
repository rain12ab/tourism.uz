<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\web\View;
use yii\web\JsExpression;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\About */
/* @var $form yii\widgets\ActiveForm */


$url = Yii::$app->homeUrl."../";

?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
	<div class="col-md-12">
	    <div class="card">
			<div class="card-header card-header-tabs">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="card-title">Boshqarma haqida</h2>
					    <ul class="nav nav-tabs justify-content-center" data-tabs="tabs">
					      <li class="nav-item">
					        <a class="nav-link active" href="#uz" data-toggle="tab">
					          O'zbekcha
					          <div class="ripple-container"></div>
					        </a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#ru" data-toggle="tab">
					          Ruscha
					          <div class="ripple-container"></div>
					        </a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#en" data-toggle="tab">
					          Inglizcha
					          <div class="ripple-container"></div>
					        </a>
					      </li>
					    </ul>
					</div>
				</div>
			</div>
	        <div class="card-body">
	            <div class="tab-content">
				  <div style="padding: 1vh;" class="tab-pane active" id="uz">
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
					 
					 // Note: In modern browsers input[type=\"file\"] is functional without 
					 // even adding it to the DOM, but that might not be the case in some older
					 // or quirky browsers like IE, so you might want to add it to the DOM
					 // just in case, and visually hide it. And do not forget do remove it
					 // once you do not need it anymore.

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
					])->label(false); ?>
				  </div>
				  <div style="padding: 1vh;" class="tab-pane" id="ru">
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
					 
					 // Note: In modern browsers input[type=\"file\"] is functional without 
					 // even adding it to the DOM, but that might not be the case in some older
					 // or quirky browsers like IE, so you might want to add it to the DOM
					 // just in case, and visually hide it. And do not forget do remove it
					 // once you do not need it anymore.

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
					])->label(false); ?>
				  </div>
				  <div style="padding: 1vh;" class="tab-pane" id="en">
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
					 
					 // Note: In modern browsers input[type=\"file\"] is functional without 
					 // even adding it to the DOM, but that might not be the case in some older
					 // or quirky browsers like IE, so you might want to add it to the DOM
					 // just in case, and visually hide it. And do not forget do remove it
					 // once you do not need it anymore.

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
					])->label(false); ?>
				  </div>
		  			<div style="float: right;" class="form-group">
					    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
	            </div>
	        </div>
	    </div>
	</div>

</div>

<?php ActiveForm::end(); ?>

</div>  

<div class="row">
	<div class="col-md-12">
	    <div class="card">
			<div class="card-header card-header-tabs">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="card-title">Rasmlar</h2>
					</div>
				</div>
			</div>
			<div class="card-body">
				<center>
					<div class="col-sm-12">
						<div class="row">
							<?php for($i = 0; $i < count($model->pics); $i++):?>
							<div style="padding: 10px;" class="col-md-2">
								<img style="width: 100%;" class="img-fluid" src="<?= $url.$model->pics[$i];?>">
								<?= Html::a('O\'chirish', ['deletepic', 'id' => $i], [
						            'class' => 'btn btn-danger text-center',
						            'data' => [
						                'confirm' => 'Aniqmi?',
						                'method' => 'post',
						            ],
						        ]) ?>
							</div>
							<?php endfor;?>
							<div style="padding: 10px;" class="col-md-2">
								<?php $form = ActiveForm::begin([
							        'action' => ['addpic'],
							        'id' => 'add-pic',
							        'method' => 'post',
							        
							        'options' => [
							            'data-pjax' => 1
							        ],
							    ]); ?>
							    <label for="about-img_file">
								<div style="margin-bottom: -30px; padding: 2px 2px;" class="btn card">
									<div class="card-body">

										
										<i style="font-size: 40px;" class="fas fa-plus"></i><span style="font-size: 20px;">Qo'shish</span>
										
										<?= $form->field($model, 'img_file', ['template' => "{input}"])->fileInput();?>
										
									</div>
								</div>
								</label>
								<?php ActiveForm::end(); ?>
							</div>
						</div>
					</div>
				</center>
			</div>
		</div>
	</div>
</div>


<?php $this->registerJs('
document.getElementById("about-img_file").onchange = function() {
    document.getElementById("add-pic").submit();
};


', yii\web\View::POS_END);?>

<?php
    $this->registerJs(
        '$("document").ready(function(){
            $("#pjax_pics").on("pjax:end", function() {
            $.pjax.reload({container:"#pictures"});
        });
    });', yii\web\View::POS_END
    );
?>

