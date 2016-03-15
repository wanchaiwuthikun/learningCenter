<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use yii\helpers\ArrayHelper;
use app\models\Course;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Exam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exam-form">
    <?= Yii::$app->session->getFlash('namecourse'); ?>
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal'
    ]); ?>
  <div class="col-md-9 ">
      <?= $form->field($model, 'coursename')->widget(TypeaheadBasic::classname(), [

          'data' => ArrayHelper::map(Course::find()->all(), 'c_id', 'c_title'),

          'pluginOptions' => ['highlight' => true],

          'options' => ['placeholder' => 'กรุณากรอกชื่อบทเรียน'],

      ]); ?>
  </div>
  <div class="col-md-3">
      <?= $form->field($model, 'e_score')->textInput() ?>
  </div>
<div class="col-md-12">
    <?= $form->field($model, 'e_question')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-12">
    <?= $form->field($model, 'e_choice01',[
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('คำตอบที่ 1'),
        ],
    ])->textInput(['maxlength' => true])->label(false) ?>
</div>
<div class="col-md-12">
    <?= $form->field($model, 'e_choice02',[
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('คำตอบที่ 2'),
        ],
    ])->textInput(['maxlength' => true])->label(false) ?>
</div>
<div class="col-md-12">
    <?= $form->field($model, 'e_choice03',[
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('คำตอบที่ 3'),
        ],
    ])->textInput(['maxlength' => true])->label(false) ?>
</div>
<div class="col-md-12">
    <?= $form->field($model, 'e_choice04', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('คำตอบที่ 4'),
        ],
    ])->textInput(['maxlength' => true])->label(false) ?>
</div>
<div class="col-md-12">
    <?= $form->field($model, 'e_choice05', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('คำตอบที่ 5'),
        ],
    ])->textInput(['maxlength' => true])->label(false) ?>
</div>
<div class="col-md-12">
    <?= $form->field($model, 'e_solve')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-12">
            <p class="pull-right">
                <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </p>
        </div>

    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
