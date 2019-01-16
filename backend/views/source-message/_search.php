<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SourceMessageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-message-search" >

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['id'=>'message-search-form']
    ]); ?>
    <div class="col-md-12  no-padding " style="margin: 0" >

        <span class="col-md-4"  style="padding: 0">
            <?= $form->field($model, 'message')->textInput(['style'=>'display:inline-block'])->label(false) ?>
            <?= Html::submitButton(Yii::t('yii', 'Search Message'), ['class' => 'btn btn-default', 'style' => 'font-size: 11px;']) ?>
            <select id="page-size" form='message-search-form' class="form-control  pull-right" size="1" style="color: green;width: 62px;padding: 6px;" name="SourceMessageSearch[page_size]" aria-controls="example">
                <option <?= (isset($_GET['SourceMessageSearch']['page_size']) and $_GET['SourceMessageSearch']['page_size']==20)?'selected':null ?> value="20">20</option>
                <option <?= (isset($_GET['SourceMessageSearch']['page_size']) and $_GET['SourceMessageSearch']['page_size']==30)?'selected':null ?> value="30">30</option>
                <option <?= (isset($_GET['SourceMessageSearch']['page_size']) and $_GET['SourceMessageSearch']['page_size']==50)?'selected':null ?> value="50">50</option>
                <option <?= (isset($_GET['SourceMessageSearch']['page_size']) and $_GET['SourceMessageSearch']['page_size']==100)?'selected':null ?> value="100">100</option>
            </select>
        </span>
        <?php
        $this->registerJs("
                    $('#page-size').on('change',function(){
                        $('#message-search-form').submit();
                    });
                ");
        ?>
    </div><div class="clearfix"></div>
    <?php ActiveForm::end(); ?>

</div>

