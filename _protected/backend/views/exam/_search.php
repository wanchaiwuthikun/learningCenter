<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ExamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exam-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'e_id') ?>

    <?= $form->field($model, 'e_question') ?>

    <?= $form->field($model, 'e_choice01') ?>

    <?= $form->field($model, 'e_choice02') ?>

    <?= $form->field($model, 'e_choice03') ?>

    <?php // echo $form->field($model, 'e_choice04') ?>

    <?php // echo $form->field($model, 'e_choice05') ?>

    <?php // echo $form->field($model, 'e_score') ?>

    <?php // echo $form->field($model, 'e_solve') ?>

    <?php // echo $form->field($model, 'c_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
