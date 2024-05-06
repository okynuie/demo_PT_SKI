<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-home"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Setting App</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Heading -->
        <div class="sidebar-heading">
        </div>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/index');?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Main Menu</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>
        <?php if ($m['id'] == 3) : ?>
        <div class="sidebar-heading">
            <?= $m['menu'];  ?>
        </div>
        

        <?php foreach ($submenu as $sm) : ?>
            <?php if ($sm['menu_id'] == 3 && $sm['is_active'] == 1) : ?>
                <?php if ($title == $sm['title']) : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span><?= $sm['title'];  ?></span></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

        <?php endif; ?>

        <?php endforeach; ?>
        <!-- END LOOPING MENU   -->


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->