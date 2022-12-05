<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-mosque"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PP Al-Jihad Surabaya</div>
    </a>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider "> -->
    <hr class="sidebar-divider ">

    <!-- Sidebar of Admin -->
    <?php if (in_groups('admin')) : ?>

        <div class="sidebar-heading">
            Admin
        </div>

        <li class="nav-item">
            <a class="nav-link" href=" <?= base_url('admin'); ?>">
                <i class="fas fa-solid fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/data_santri">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Santri</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/tagihan">
                <i class="fa-solid fa-money-bill-wave"></i>
                <span>Tagihan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/laporan">
                <i class="fa-solid fa-rupiah-sign"></i>
                <span>Laporan Syahriah</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/">
                <i class="fa-solid fa-gear"></i>
                <span>Role Management</span></a>
        </li>
        <hr class="sidebar-divider ">

    <?php endif; ?>

    <!-- Sidebar of User -->
    <?php if (in_groups('user')) : ?>

        <div class="sidebar-heading">
            Santri
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/user/tagihan">
                <i class="fa-solid fa-money-bill-wave"></i>
                <span>Tagihan</span></a>
        </li>
        <hr class="sidebar-divider ">

    <?php endif; ?>

    <div class="sidebar-heading">
        Profile
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Logut -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>