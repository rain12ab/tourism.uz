<?php

use yii\helpers\Html;
use yii\helpers\Arrayhelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model frontend\models\GuidesSearch */
/* @var $form yii\widgets\ActiveForm */
$data = common\models\Country::find()->select(['id', 'language_code'])->asArray()->all();
$count = common\models\Country::find()->select(['id', 'language_code'])->count();
// var_dump($data).'<br>';
for ($i=0; $i > $count; $i++) { 
    $data[$i] = $data[id];
    unset($data[$i][$i]);

}



$data = Arrayhelper::map($data, 'id', 'language_code');
$data = array_filter($data);

?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]);
$this->registerJs("

$(document).on('change', '#gid_name', function(){

    $(this).closest('form').submit();

})

", yii\web\View::POS_END);

$this->registerJs("

$(document).on('change', '#languages', function(){

    $(this).closest('form').submit();

})

", yii\web\View::POS_END);

if(Yii::$app->language == 'uz') {
    $l = 'ru';
}
else {
    $l = Yii::$app->language;
}
?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'gid_name', ['inputOptions' => ['name' => 'gid_name', 'class' => 'form-control']]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'languages')->widget(Select2::classname(), [
                'data' =>$data,
                'language' => 'ru',
                'size' => Select2::LARGE,
                'options' => ['placeholder' => Yii::t('app', 'Tanlash').'...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true,
                ],
            ]); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Qidirish'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

