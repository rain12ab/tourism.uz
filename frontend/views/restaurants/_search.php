<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\typeahead\Typeahead;


$list = ArrayHelper::map(common\models\Restaurants::getList(),'id','name');
/* @var $this yii\web\View */
/* @var $model frontend\models\ObjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => true
    ],
]);

$this->registerJs("

$(document).on('change', '#res_name', function(){

    $(this).closest('form').submit();

})

", yii\web\View::POS_END);

$this->registerJs("

$(document).on('change', '#type_id', function(){

    $(this).closest('form').submit();

})

", yii\web\View::POS_END);

?>

<div style="margin-bottom: 30px;" class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'res_name', ['inputOptions' => ['name' => 'res_name', 'class' => 'form-control']])->widget(Typeahead::classname(), [
            'options' => ['placeholder' => Yii::t('app', 'Qidirish').'...'],
            'pluginOptions' => ['highlight'=>true],
            'dataset' => [
                [
                    'display' => 'value',
                    'remote' => [
                        'url' => Url::to(['restaurants/list']) . '?q=%QUERY',
                        'wildcard' => '%QUERY'
                    ],
                    'limit' => 10
                ]
            ]
        ]); ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'type_id', ['inputOptions' => ['name' => 'type', 'class' => 'form-control']])->dropDownList($list, ['prompt'=> Yii::t('app', 'Tanlash').'...']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>