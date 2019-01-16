<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Message */

$this->title = Yii::t('yii', 'Translate Message');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
