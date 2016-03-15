<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' เนื้อหา ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index">

    <p class="pull-right">
        <?= Html::a('เพิ่มเนื้อหา', ['create', 'id' => $c_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            's_title',





            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
