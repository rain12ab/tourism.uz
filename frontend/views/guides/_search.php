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


$url = \Yii::$app->homeUrl.'images/flags/';
$format = <<< SCRIPT
function format(state) {
    if (!state.id) return state.text;
    src = '$url' +  state.id.toLowerCase() + '.gif'
    return '<img class="flag" src="' + src + '"/>' + state.text;
}
SCRIPT;
$escape = new JsExpression("function(m) { return m; }");
$this->registerJs($format, yii\web\View::POS_HEAD);
?>
<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]);

?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'gid_name', ['inputOptions' => ['name' => 'gid_name', 'class' => 'form-control']]) ?>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'languages')->widget(Select2::classname(), [
                        'data' =>$data,
                        'theme' => Select2::THEME_DEFAULT,
                        'options' => ['placeholder' => Yii::t('app', 'Tanlash').'...'],
                        'options' => ['class' => 'form-control'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'multiple' => true,
                        ],
                    ]); ?>
                </div>
                <div class="col-md-4">
                    <?= Html::submitButton(Yii::t('app', 'Tanlash'), ['class' => 'btn btn-primary']) ?>
                </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

