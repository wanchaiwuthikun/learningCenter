<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แบบทดสอบ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="pull-right">
        <?= Html::a('เพิ่มแบบทดสอบ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'summary'      => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'c.c_title',
            'e_question',
//            'e_choice01',
//            'e_choice02',
//            'e_choice03',
            // 'e_choice04',
            // 'e_choice05',
             'e_score',
             'e_solve',
            // 'c_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
