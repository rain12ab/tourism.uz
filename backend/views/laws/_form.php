<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model common\models\Laws */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><?= $this->title;?></h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'name_uz')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'name_ru')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'url_uz')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'url_ru')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'lawtype_id')->dropDownList(ArrayHelper::map(common\models\Laws::getType(),'id','name'), ['prompt' => 'Hujjat turi', 'style' => 'color: pink;']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'date')->widget(DateControl::classname(), [
                            'type'=>DateControl::FORMAT_DATE,
                            'displayFormat' => 'php:d/m/Y',
                            'saveFormat' => 'php:d/m/Y',
                            'language' => 'ru',
                        ]); ?>
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