<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subject */

$this->title = 'แก้ไขเนื้อหา '
//$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->s_id, 'url' => ['view', 'id' => $model->s_id]];
//$this->params['breadcrumbs'][] = 'Update';
//?>
<div class="subject-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
