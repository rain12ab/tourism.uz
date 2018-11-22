<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$list = ArrayHelper::map(common\models\Laws::getType(),'id','name');
$list[''] = Yii::t('app', 'Barcha normativ-hujjatlar');

/* @var $this yii\web\View */
/* @var $model frontend\models\LawsSearch */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("

$(document).on('change', '#lawtype_id', function(){

    $(this).closest('form').submit();

})

", yii\web\View::POS_READY);
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
        <?= $form->field($model, 'lawtype_id', ['inputOptions' => ['name' => 'type', 'class' => 'form-control']])->dropDownList($list, ['prompt'=> '']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
