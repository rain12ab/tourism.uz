<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hotels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotels-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stars')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic4')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
