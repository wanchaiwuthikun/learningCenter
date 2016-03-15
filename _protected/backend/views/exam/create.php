<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Exam */

$this->title = ' ';
//$this->params['breadcrumbs'][] = ['label' => 'Exams', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-create">
    <div class="col-md-10 col-md-offset-1 well bs-component">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
