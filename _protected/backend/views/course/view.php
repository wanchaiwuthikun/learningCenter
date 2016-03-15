<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = ' ';

?>
<div class="course-view">

<div class="col-md-offset-1 col-md-10">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'c_id',
            'c_title',
            'c_object:html',
            'c_learn:html',
//            'c_expect:ntext',
        ],
    ]) ?>
</div>
    <div class="col-md-offset-1 col-md-10">
        <p class="pull-right">
            <?= Html::a('เพิ่มบทเรียน', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('แก้ไข', ['update', 'id' => $model->c_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('ลบ', ['delete', 'id' => $model->c_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'คุณแน่ใจหรือไม่ว่าคุณจะลบบทเรียนนี้ และเนื้อหาที่เกี่ยวกับหมดเรียนนี้จะถูกลบทั้งหมด',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
</div>
