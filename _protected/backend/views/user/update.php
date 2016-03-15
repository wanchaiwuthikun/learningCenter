<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $role common\rbac\models\Role; */

$this->title = Yii::t('app', 'แก้ไขผู้ใช้งาน') . ': ' . $user->username;
?>
<div class="user-update">
    <div class="col-md-offset-2 col-md-8 well bs-component">

        <?= $this->render('_form', [
            'user' => $user,
            'role' => $role,
        ]) ?>

    </div>

</div>
