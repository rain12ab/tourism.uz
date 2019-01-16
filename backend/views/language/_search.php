<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use common\models\Language;

/* @var $this yii\web\View */
/* @var $model app\models\LanguageSearch */
/* @var $form yii\widgets\ActiveForm */

$all = Language::find()->count();
$no_active_count = Language::find()->where('status=:status')->params([':status'=>'0'])->count();
$active_count = Language::find()->where('status=:status')->params([':status'=>'1'])->count();

?>


<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['id'=>'language-search-form']
    ]); ?>
    <div class="col-md-12" style="margin: 0" >
        <?php
        if (empty($_GET)) {
            $all_active = 'count-active';
        }else{
            $all_active = '';
        }
        if (isset($_GET['LanguageSearch']['status']) and $_GET['LanguageSearch']['status']==1) {
            $active = 'count-active';
        }else{
            $active = '';
        }
        if (isset($_GET['LanguageSearch']['status']) and $_GET['LanguageSearch']['status']==0) {
            $no_active = 'count-active';
        }else{
            $no_active = '';
        }

        ?>
        <a href="<?= \yii\helpers\Url::to(['language/index']) ?>" style="font-size: 14px;" class="btn <?= $all_active?> btn-link">
            <?= Yii::t('yii','All') ?> <span class="count-post"> (<?= $all ?>) </span>
        </a>|
        <a href="<?= \yii\helpers\Url::to(['language/index','LanguageSearch[status]'=>1]) ?>" style="font-size: 14px;" class="btn <?= $active?>  btn-link">
            <?= Yii::t('yii','Active') ?> <span class="count-post"> (<?= $active_count ?>) </span>
        </a>|
        <a href="<?= \yii\helpers\Url::to(['language/index','LanguageSearch[status]'=>0]) ?>" style="font-size: 14px;" class="btn <?= $no_active?>  btn-link">
            <?= Yii::t('yii','No Active') ?> <span class="count-post"> (<?= $no_active_count ?>) </span>
        </a>
    </div>
    <?php ActiveForm::end(); ?>

</div>

