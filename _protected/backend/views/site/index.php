<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = ' ';
?>
<div class="site-index">




<!--    <div class="col-md-12">-->

<div class="row">
<div style="padding: 30px"></div>

            <div class="col-md-offset-2 col-md-3">
                <div class="thumbnail">
                    <?= Html::a(Html::img(Yii::getAlias('/uploads/menu/user.png') ,[
//                        'class' => 'img-circle',
                        'alt' => '',
//                        'width' => '200px',
//                        'height' => '200px',
                    ]),['user/index']);  ?>
                    <div class="caption">
                       <?= Html::a('<h4 style="text-align: center">จัดการผู้ใช้งาน</h4>',['user/index']) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1">
                <div class="thumbnail">
                    <?= Html::a(Html::img('/uploads/menu/learn.png',[
//                        'class' => 'img-circle',
                        'alt' => '',
//                        'width' => '200px',
//                        'height' => '100px',
                    ]),['course/index']);  ?>
                    <div class="caption">
                        <?= Html::a('<h4 style="text-align: center">จัดการบทเรียน</h4>',['course/index']) ?>
                    </div>
                </div>
            </div>
</div>
<div class="row">
        <div class="col-md-3 col-md-offset-2">
           <div class="thumbnail">
              <?= Html::a(Html::img('/uploads/menu/lesson.png',[
                'alt' => '',
                ]),['subject/index']);  ?>
             <div class="caption">
            <?= Html::a('<h4 style="text-align: center">จัดการเนื้อหา</h4>',['subject/index']) ?>
           </div>
        </div>
      </div>
<div class="col-md-3 col-md-offset-1">
    <div class="thumbnail">
        <?= Html::a(Html::img('/uploads/menu/exam.png',[
            'alt' => '',
        ]),['exam/index']);  ?>
        <div class="caption">
            <?= Html::a('<h4 style="text-align: center">จัดการแบบทดสอบ</h4>',['exam/index']) ?>
        </div>
    </div>
</div>
</div>

<!--    </div>-->

<!--    </div>-->


