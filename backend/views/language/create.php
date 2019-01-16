<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Language */

$this->title = Yii::t('yii', 'Добавить язык');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
