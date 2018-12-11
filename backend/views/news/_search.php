<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsSeach */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'title_uz') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'author') ?>
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
                <div class="form-group">
                    <?= Html::submitButton('Qidirish', ['class' => 'btn btn-default']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>