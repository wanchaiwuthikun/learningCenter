<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = ' ';
?>
<div class="user-view">

    <div class="col-md-offset-1 col-md-10">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                [
                    'format'=>'raw',
                    'attribute'=>'picture',
                    'value'=>Html::img($model->getPictureViwer(),['class'=>'img-thumbnail','style'=>'width:100px;'])
                ],
                'name',
                'lastname',
                'username',
                'email:email',
                //'password_hash',
                [
                    'attribute'=>'status',
                    'value' => $model->getStatusName(),
                ],
                [
                    'attribute'=>'item_name',
                    'value' => $model->getRoleName(),
                ],
                //'auth_key',
                //'password_reset_token',
                //'account_activation_token',
//            'created_at:date',
//            'updated_at:date',
            ],
        ]) ?>
    </div>

        <div class="pull-right col-md-4">
            <?= Html::a(Yii::t('app', 'ย้อนกลับ'), ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a(Yii::t('app', 'แก้ไข'), ['update', 'id' => $model->id], [
                'class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'ลบ'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'คุณแน่ใจหรือไม่ที่จะลบผู้ใช้คนนี้'),
                    'method' => 'post',
                ],
            ]) ?>

        </div>


</div>
