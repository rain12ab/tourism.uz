<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\About */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pic1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic5')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
