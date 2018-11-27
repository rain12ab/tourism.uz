<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\GuidesSearch */
/* @var $form yii\widgets\ActiveForm */
$data = common\models\Country::find()->select(['id', 'language_code'])->asArray()->all();
$count = common\models\Country::find()->select(['id', 'language_code'])->count();
var_dump($data).'<br>';
for ($i=0; $i > $count; $i++) { 
    $data[] = $data[$i][id];
    unset($data[$i]);
}

var_dump($data);

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
                        'data' => $data,
                        'options' => ['placeholder' => Yii::t('app', 'Tanlash').'...'],
                        'options' => ['class' => 'form-control'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'multiple' => true
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

