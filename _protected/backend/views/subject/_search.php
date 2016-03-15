<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SubjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 's_id') ?>

    <?= $form->field($model, 's_title') ?>

    <?= $form->field($model, 's_outcomes') ?>

    <?= $form->field($model, 's_standard') ?>

    <?= $form->field($model, 's_behavior') ?>

    <?php // echo $form->field($model, 's_knowledge') ?>

    <?php // echo $form->field($model, 's_learn') ?>

    <?php // echo $form->field($model, 's_evaluate') ?>

    <?php // echo $form->field($model, 's_activities') ?>

    <?php // echo $form->field($model, 's_pdf') ?>

    <?php // echo $form->field($model, 's_video') ?>

    <?php // echo $form->field($model, 's_ppt') ?>

    <?php // echo $form->field($model, 'c_id') ?>

    <?php // echo $form->field($model, 's_worksheet') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
