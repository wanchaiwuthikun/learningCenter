<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Subject */

$this->title = ' ';
//$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            's_id',
            'c.c_title',
//            's_file',
            's_video',
            [
                'attribute'=>'s_file',
                'value'=>$model->listDownloadFiles('s_file'),'format'=>'html'
            ],

            [
                'attribute'=>'s_worksheet',
                'value'=>$model->listDownloadFiles('s_worksheet'),'format'=>'html'
            ],
        ],
    ]) ?>
    <p class="pull-right">
        <?= Html::a('เพิ่ม', ['create', 'id' => $model->c_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->s_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->s_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
