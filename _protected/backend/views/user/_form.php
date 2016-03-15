<?php
use common\rbac\models\AuthItem;
use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $form yii\widgets\ActiveForm */
/* @var $role common\rbac\models\Role; */
?>
<!--<div class="">-->

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'layout'  => 'horizontal'

      ]); ?>


<div class="col-md-12">
    <div class="col-md-3 well text-center">
        <?= Html::img($user->getPictureViwer(),['style'=>'width:90px; height:90px','class'=>'img-rounded']); ?>
    </div>
    <div class="col-md-2">
        <br> <br> <br> <br> <br>
        <?= $form->field($user, 'picture')->fileInput()->label(false) ?>
    </div>
</div>


<div class="col-md-6">

        <?= $form->field($user, 'name') ?>

</div>
<div class="col-md-6">
    <?= $form->field($user, 'lastname') ?>
</div>
<div class="col-md-6">
    <?= $form->field($user, 'email') ?>
</div>
<div class="col-md-6">
    <?= $form->field($user, 'faculty') ?>
</div>
<div class="col-md-12">

    <?= $form->field($user, 'department') ?>
</div>
<div class="col-md-12">
    <?= $form->field($user, 'username') ?>
</div>
<div class="col-md-12">
    <?php if ($user->scenario === 'create'): ?>
        <?= $form->field($user, 'password')->widget(PasswordInput::classname(), []) ?>
    <?php else: ?>
        <?= $form->field($user, 'password')->widget(PasswordInput::classname(), [])
            ->passwordInput(['placeholder' => Yii::t('app', 'เปลี่ยนรหัสผ่าน')])
        ?>
    <?php endif ?>
</div>

    <div class="row">
    <div class="col-md-6">

        <!-- <?= $form->field($user, 'status')->dropDownList($user->statusList) ?> -->
    </div>
        <div class="col-md-6">
            <?php foreach (AuthItem::getRoles() as $item_name): ?>
                <?php $roles[$item_name->name] = $item_name->name ?>
            <?php endforeach ?>
            <?= $form->field($role, 'item_name')->dropDownList($roles)->label('สิทธ์') ?>

        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 pull-right">
            <?= Html::submitButton($user->isNewRecord ? Yii::t('app', 'เพิ่ม')
                : Yii::t('app', 'แก้ไข'), ['class' => $user->isNewRecord
                ? 'btn btn-success pull-right' : 'btn btn-primary']) ?>

            <?= Html::a(Yii::t('app', 'ยกเลิก'), ['user/index'], ['class' => 'btn btn-default']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
 
<!--</div>-->
