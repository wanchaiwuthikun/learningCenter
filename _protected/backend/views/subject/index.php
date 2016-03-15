<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Subject;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' เนื้อหา ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'c_title',
            [
                'attribute' => 'c_id' ,
//                'label'     =>  'รวม' ,
                'value'     => function($attribute, $model, $data) {
                    return  Subject::find()->where(['c_id' => $model])->count('s_id');
                }

            ],





            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} </div>',
                'options'=> ['style'=>'width:150px;'],
                'buttons'=>[
                    'view' => function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',['index2','id'=>$model->c_id]);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
