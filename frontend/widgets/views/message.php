<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>





    <?php $form = ActiveForm::begin(['options' => ['class' => 'probootstrap-form mb60']]); ?>
    <div class="row">
      <div class="col-md-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-4">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-4">
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
      </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Jo\'natish'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
