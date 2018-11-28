<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
