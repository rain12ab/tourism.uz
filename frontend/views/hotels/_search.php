<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\typeahead\Typeahead;


$list = ArrayHelper::map(common\models\Hotels::getList(),'id','name');
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

$(document).on('change', '#hotel_name', function(){

    $(this).closest('form').submit();

})

", yii\web\View::POS_END);

$this->registerJs("

$(document).on('change', '#hotel_type', function(){

    $(this).closest('form').submit();

})

", yii\web\View::POS_END);

?>

<div style="margin-bottom: 30px;" class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'hotel_name', ['inputOptions' => ['name' => 'hotel_name', 'class' => 'form-control']])->widget(Typeahead::classname(), [
            'options' => ['placeholder' => Yii::t('app', 'Qidirish').'...'],
            'pluginOptions' => ['highlight'=>true],
            'dataset' => [
                [
                    'display' => 'value',
                    'remote' => [
                        'url' => Url::to(['hotels/list']) . '?q=%QUERY',
                        'wildcard' => '%QUERY'
                    ],
                    'limit' => 10
                ]
            ]
        ]); ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'hotel_type', ['inputOptions' => ['name' => 'type', 'class' => 'form-control']])->dropDownList($list, ['prompt'=> Yii::t('app', 'Tanlash').'...']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>