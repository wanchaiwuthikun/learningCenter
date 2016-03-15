<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal'
    ]); ?>
   <div class="col-md-12">
       <?= $form->field($model, 'c_title')->textInput(['maxlength' => true]) ?>
   </div>
   <div class="col-md-12">
       <?= $form->field($model, 'c_object')->widget(\yii\redactor\widgets\Redactor::className(), [
           'clientOptions' => [
               'lang' => 'th',
               'plugins' => ['clips', 'fontcolor']
           ]]) ?>
   </div>
   <div class="col-md-12">
       <?= $form->field($model, 'c_learn')->widget(\yii\redactor\widgets\Redactor::className(), [
           'clientOptions' => [
               'lang' => 'th',
               'plugins' => ['clips', 'fontcolor']
           ]]) ?>
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
