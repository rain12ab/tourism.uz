<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model common\models\MessageSearch */
/* @var $form yii\widgets\ActiveForm */
$all = \common\models\Message::find()->count();
?>

<div class="message-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['id'=>'message-search-form']
    ]); ?>
    <div class="col-md-12 no-padding  link-a" style="margin: 0;" >
        <?php
            if (empty($_GET)) {
                $all_active = 'count-active';
            }else{
                $all_active = '';
            }
        ?>
        <a style="font-size: 12px;padding: 0" href="<?= \yii\helpers\Url::to(['message/index']) ?>" class="btn <?= $all_active?>  btn-link">
            <?= Yii::t('yii','All') ?> <span class="count-post"> (<?= $all ?>) </span>
        </a>
        <?php

            $languages = \common\models\Language::find()->joinWith(['langname'])->where('`language_code`!="ru"')->all();
            foreach ($languages as $language) {
                $count = \common\models\Message::find()->where(['language'=>$language->langname->language_code])->count();
                if (isset($_GET['MessageSearch']['language']) and $_GET['MessageSearch']['language']==$language->langname->language_code) {
                    $is_active = 'count-active';
                }else{
                    $is_active = '';
                }

                ?>
               | <a style="font-size: 12px;padding: 0"  href="<?= \yii\helpers\Url::to(['message/index', 'MessageSearch[language]'=>$language->langname->language_code]) ?>" class="btn <?= $is_active?>  btn-link">
                    <?= $language->name ?> <span class="count-post"> (<?= $count ?>) </span>
                </a>
            <?php
            }

        ?>
        <span class="col-md-4"  style="padding: 0;">
            <?= $form->field($model, 'translation')->textInput(['style'=>'display:inline-block'])->label(false) ?>
            <?= Html::submitButton(Yii::t('yii', 'Search Message'), ['class' => 'btn btn-default', 'style' => 'font-size: 11px;']) ?>
            <select id="page-size" form='message-search-form' class="form-control  pull-right" size="1" style="color: green;width: 62px;padding: 6px;" name="MessageSearch[page_size]" aria-controls="example">
                <option <?= (isset($_GET['MessageSearch']['page_size']) and $_GET['MessageSearch']['page_size']==20)?'selected':null ?> value="20">20</option>
                <option <?= (isset($_GET['MessageSearch']['page_size']) and $_GET['MessageSearch']['page_size']==30)?'selected':null ?> value="30">30</option>
                <option <?= (isset($_GET['MessageSearch']['page_size']) and $_GET['MessageSearch']['page_size']==50)?'selected':null ?> value="50">50</option>
                <option <?= (isset($_GET['MessageSearch']['page_size']) and $_GET['MessageSearch']['page_size']==100)?'selected':null ?> value="100">100</option>
            </select>
        </span>
        <?php
        $this->registerJs("
                    $('#page-size').on('change',function(){
                        $('#message-search-form').submit();
                    });
                ");
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
