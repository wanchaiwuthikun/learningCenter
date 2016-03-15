<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Subject */

$this->title = 'เพิ่มเนื้อหา';
//$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">
    <div class="col-md-10 col-md-offset-1">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->



</div>
