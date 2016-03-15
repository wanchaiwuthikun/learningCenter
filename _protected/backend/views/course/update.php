<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = 'แก้ไขบทเรียน  ';
//$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->c_id, 'url' => ['view', 'id' => $model->c_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-update">

    <div class=" col-md-12 ">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
