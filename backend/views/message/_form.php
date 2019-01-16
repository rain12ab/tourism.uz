<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6"  >
        <?= $form->field($model, 'id')->widget(\kartik\select2\Select2::classname(), [
            'disabled'=>(!$model->isNewRecord)?true:false,
            'data'=>\yii\helpers\ArrayHelper::map(\common\models\SourceMessage::find()->orderBy('id DESC')->all(),'id','message'),
            'options' => [
//                'readonly'=>(!$model->isNewRecord)?'readonly':null,
                'placeholder' => Yii::t('yii','Message'),],
        ])->label(false);?>
    </div>
    <div class="col-md-6"  >

        <?php
        // Templating example of formatting each list element
        $url = Yii::$app->request->baseUrl . '/../images/flags/';
        $format = <<< SCRIPT
function format(state) {
    if (!state.id) return state.text; // optgroup
    src = '$url' +  state.text+ '.gif';
    return '<img style="width:30px; height:20px;" src="' + src + '"/> ' + state.text.split('.')[0];
}
SCRIPT;
        $escape = new JsExpression("function(m) { return m; }");
        $this->registerJs($format, \yii\web\View::POS_HEAD);
        if ($model->isNewRecord) {
            $model->language = 'uz';
        }
        echo $form->field($model, 'language')->widget(\kartik\select2\Select2::classname(), [
            'disabled'=>(!$model->isNewRecord)?true:false,
            'data'=>\yii\helpers\ArrayHelper::map(\common\models\Language::find()->joinWith(['langname'])->where('language.status="1"')->andWhere('`language_code`!="uz"')->orderBy('name ASC')->all(),'langname.language_code','langname.language_code','name'),
            'options' => ['placeholder' => Yii::t('yii','Language'),],
            'pluginOptions' => [
                'templateResult' => new JsExpression('format'),
                'templateSelection' => new JsExpression('format'),
                'escapeMarkup' => $escape,
//            'allowClear' => true
            ],
        ])->label(false);
        ?>
    </div>
    <div class="col-md-12">
        <?= $form->field($model, 'translation')->textarea(['class'=>'form-control border-left-color','rows' => 6]) ?>
    </div>
    <div class="form-group col-md-12">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Create') : Yii::t('yii', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
