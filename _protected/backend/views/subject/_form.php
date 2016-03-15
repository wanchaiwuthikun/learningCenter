<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use kartik\typeahead\TypeaheadBasic;
use app\models\Course;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Subject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-form">

    <?= Yii::$app->session->getFlash('namecourse'); ?>
    <?php $form = ActiveForm::begin([
        'layout'  => 'horizontal',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <?php if(Yii::$app->session->hasFlash('alert')):?>
        <?= Alert::widget([
            'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
            'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
        ])?>
    <?php endif; ?>
  <div class="col-md-12">


   <?= $form->field($model, 'coursename')->widget(TypeaheadBasic::classname(), [

       'data' => ArrayHelper::map(Course::find()->all(), 'c_id', 'c_title'),

       'pluginOptions' => ['highlight' => true],

       'options' => ['readonly' => true],

   ]); ?>

    <?= $form->field($model, 's_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_worksheet')->widget(FileInput::className(),[
       'options' => [
           'multiple' => false,
       ],
       'pluginOptions'  => [
           'showPreview'           => false,
           'showRemove'            => false,
           'browseLabel'           => 'เลือกไฟล์',
           'removeLabel'           => 'ลบไฟล์',
           'showUpload'            => false,
   ]

   ]) ?>

    <?= $form->field($model, 's_video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_file[]')->widget(FileInput::className(),[
        'options' => [
            'multiple' => true
        ],
            'pluginOptions' => [
                'initialPreview'        => $model->initialPreview($model->s_file,'s_file','file'),
                'initialPreviewConfig'  => $model->initialPreview($model->s_file,'s_file','config'),
                'allowedFileExtensions' => ['pdf','ppt'],
                'showPreview'           => true,
                'showRemove'            => true,
                'showUpload'            => false,
                'browseLabel'           => 'เลือกไฟล์',
                'removeLabel'           => 'ลบไฟล์',
                'overwriteInitial'      => false

            ]
    ]) ?>
  </div>


    <div class="form-group">
        <div class="col-md-10">
            <p class="pull-right">
                <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </p>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
