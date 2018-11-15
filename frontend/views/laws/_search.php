<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LawsSearch */
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
    <div class="col-md-6">
        <?php if(Yii::$app->language == 'uz'){
            echo $form->field($model, 'name_uz');
        } 
        else if(Yii::$app->language == 'ru'){
            echo $form->field($model, 'name_ru');
        } 
        else
        {
            null;
        }?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'lawtype_id') ?>
    </div>
</div>
 <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
