<?php
use common\helpers\ImageHelper;
use backend\widgets\menu\MenuLeftWidget;
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img class="img-circle head_portrait" src="<?= ImageHelper::defaultHeaderPortrait($manager->head_portrait); ?>"/>
            </div>
            <div class="pull-left info">
                <p><?= $manager->username; ?></p>
                <a href="#">
                    <i class="fa fa-circle text-success"></i>
                    <?php if (Yii::$app->services->auth->isSuperAdmin()){ ?>
                        超级管理员
                    <?php }else{ ?>
                        <?= Yii::$app->services->authRole->getTitle() ?>
                    <?php } ?>
                </a>
            </div>
        </div>
        <!-- 侧边菜单 -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" data-rel="external">系统菜单</li>
            <?= MenuLeftWidget::widget(); ?>
            <?php if (Yii::$app->debris->config('sys_related_links') == true){ ?>
                <li class="header" data-rel="external">相关链接</li>
               
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>