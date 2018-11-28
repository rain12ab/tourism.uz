<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeamSeach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'full_name_uz') ?>

    <?= $form->field($model, 'full_name_ru') ?>

    <?= $form->field($model, 'full_name_en') ?>

    <?= $form->field($model, 'post_uz') ?>

    <?php // echo $form->field($model, 'post_ru') ?>

    <?php // echo $form->field($model, 'post_en') ?>

    <?php // echo $form->field($model, 'pic') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
