<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AboutSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'content_uz') ?>

    <?= $form->field($model, 'content_ru') ?>

    <?= $form->field($model, 'content_en') ?>

    <?= $form->field($model, 'pic1') ?>

    <?php // echo $form->field($model, 'pic2') ?>

    <?php // echo $form->field($model, 'pic3') ?>

    <?php // echo $form->field($model, 'pic4') ?>

    <?php // echo $form->field($model, 'pic5') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
