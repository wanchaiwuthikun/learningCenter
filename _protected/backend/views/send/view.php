<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Send */

$this->title = $model->send_id;
$this->params['breadcrumbs'][] = ['label' => 'Sends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="send-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->send_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->send_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'send_id',
            'send_file',
            'send_comment:ntext',
            'user_id',
            'e_id',
            'c_id',
            'st_id',
            's_id',
        ],
    ]) ?>

</div>
