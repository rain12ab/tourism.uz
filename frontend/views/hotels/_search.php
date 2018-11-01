<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\HotelsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotels-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'content_uz') ?>

    <?= $form->field($model, 'content_ru') ?>

    <?= $form->field($model, 'content_en') ?>

    <?php // echo $form->field($model, 'stars') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'adress_uz') ?>

    <?php // echo $form->field($model, 'adress_ru') ?>

    <?php // echo $form->field($model, 'adress_en') ?>

    <?php // echo $form->field($model, 'pic1') ?>

    <?php // echo $form->field($model, 'pic2') ?>

    <?php // echo $form->field($model, 'pic3') ?>

    <?php // echo $form->field($model, 'pic4') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
