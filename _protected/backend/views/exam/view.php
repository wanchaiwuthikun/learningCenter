<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Exam */

$this->title = ' ';
?>
<div class="exam-view">
    <div class="col-md-10 col-md-offset-1">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'c.c_title',
                'e_question',
                'e_choice01',
                'e_choice02',
                'e_choice03',
                'e_choice04',
                'e_choice05',
                'e_score',
                'e_solve',

            ],
        ]) ?>
    </div>
    <div class="col-md-11">
        <p class="pull-right">
            <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('แก้ไข', ['update', 'id' => $model->e_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('ลบ', ['delete', 'id' => $model->e_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'คุณแน่ใจหรือไม่ว่าจะลบแบบทดสอบนี้',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

</div>
