<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = 'เพิ่มบทเรียน ';
?>
<div class="course-create">
    <div class=" col-md-12 ">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
   </div>

</div>
