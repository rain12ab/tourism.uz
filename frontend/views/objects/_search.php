<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model frontend\models\ObjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]); 
if(Yii::$app->language == 'uz')
    {
        $name = 'name_uz';
    }
else if(Yii::$app->language == 'ru')
    {
        $name = 'name_ru';
    }
else if(Yii::$app->language == 'en')
    {
        $name = 'name_en';
    }
else
    {
        $name = null;
    }

$this->registerJs("

$(document).on('change', '#objectssearch-".$name."', function(){

    $(this).closest('form').submit();

})

", yii\web\View::POS_READY);

?>

<div style="margin-bottom: 30px;" class="row">
    <div class="col-md-12">
        <?= $form->field($model, $name)->widget(Typeahead::classname(), [
            'options' => ['placeholder' => Yii::t('app', 'Qidirish').'...'],
            'pluginOptions' => ['highlight'=>true],
            'dataset' => [
                [
                    'display' => 'value',
                    'remote' => [
                        'url' => Url::to(['objects/list']) . '?q=%QUERY',
                        'wildcard' => '%QUERY'
                    ],
                    'limit' => 10
                ]
            ]
        ]); ?>
    </div>
</div>
<?php ActiveForm::end(); ?>