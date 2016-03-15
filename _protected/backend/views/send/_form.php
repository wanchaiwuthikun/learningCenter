<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Send */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="send-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'send_id')->textInput() ?>

    <?= $form->field($model, 'send_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'send_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'e_id')->textInput() ?>

    <?= $form->field($model, 'c_id')->textInput() ?>

    <?= $form->field($model, 'st_id')->textInput() ?>

    <?= $form->field($model, 's_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
