<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Language */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="language-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model);?>

    <div class="col-md-6">
        <?= $form->field($model, 'name',[
            'addon' => [
                'prepend' => [
                    'content' => \kartik\helpers\Html::icon('pencil')
                ]
            ],
        ]) ?>
    </div>
    <div class="col-md-6">
        <?php
        $url = Yii::$app->request->baseUrl . '/media/flags/';
        $format = <<< SCRIPT
function format(state) {
    if (!state.id) return state.text; // optgroup
    src = '$url' +  state.text+ '.gif';
    return '<img style="width:30px; height:20px;" src="' + src + '"/> ' + state.text.split('.')[0];
}
SCRIPT;
        $escape = new JsExpression("function(m) { return m; }");
        $this->registerJs($format, \yii\web\View::POS_HEAD);
        $data = \yii\helpers\ArrayHelper::map(\common\models\Country::find()->where('`language_code` IS NOT NULL and status="1"')->orderBy('language_code ASC')->all(),'id','language_code','nice_name');
        $data =  \backend\controllers\DefaultController::jsonDecodeArray($data,1);

        echo $form->field($model, 'language_code_id')->widget(\kartik\select2\Select2::classname(), [
            'addon' => [
                'prepend' => [
                    'content' => \kartik\helpers\Html::icon('globe')
                ]
            ],
            'data'=>$data,
            'options' => ['class'=>'spanMinha','placeholder' => Yii::t('yii','Language Code'),],
            'pluginOptions' => [
                'templateResult' => new JsExpression('format'),
                'templateSelection' => new JsExpression('format'),
                'escapeMarkup' => $escape,
//            'allowClear' => true
            ],
        ]);
        ?>

    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">

        <?= $form->field($model, 'position',[
            'addon' => [
                'prepend' => [
                    'content' => \kartik\helpers\Html::icon('sort-numeric-asc',[],'fa fa-')
                ]
            ],
        ])->textInput(['type'=>'number', 'min'=>1]) ?>
    </div>
    <div class="col-md-6">
        <?php
        if ($model->isNewRecord) {
            $model->status = '1';
        }
        echo $form->field($model, 'status')->widget(\kartik\select2\Select2::classname(), [
            'addon' => [
                'prepend' => [
                    'content' => \kartik\helpers\Html::icon('adjust')
                ]
            ],
            'data'=>\backend\controllers\DefaultController::getStatus1(),
            'options' => ['placeholder' => Yii::t('yii','Status'),],
            'pluginOptions' => [
                'allowClear' => false
            ],
        ]);?>
    </div>
    <div class="form-group col-md-12">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
