<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Guides */

$this->title = 'Gid kiritish';
$this->params['breadcrumbs'][] = ['label' => 'Gidlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guides-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
