<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\GuidesSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]); ?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'gid_name') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'languages') ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

