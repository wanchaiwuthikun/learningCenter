<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= '/uploads/'.Yii::$app->user->identity->picture   ?>" class="img-circle" alt="User Image"/>



            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'การจัดการ', 'options' => ['class' => 'header']],
                    ['label' => 'ผู้ใช้งาน', 'icon' => 'fa fa-user', 'url' => ['/user/index']],
                    ['label' => 'บทเรียน', 'icon' => 'fa fa-leanpub', 'url' => ['/course/index']],
                    ['label' => 'เนื้อหา', 'icon' => 'fa fa-book', 'url' => ['/subject/index']],
                    ['label' => 'แบบทดสอบ', 'icon' => 'fa fa-check-square-o', 'url' => ['/exam/index']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'ตรวจสอบ',
                        'icon' => 'fa fa-th-list',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ใบงาน', 'icon' => 'fa fa-file', 'url' => ['/send/index'],],
//                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'fa fa-circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
