<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php if ($user['role'] === "Administrator") : ?>
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= base_url('user') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            User
                        </a>
                    <?php endif; ?>
                    <div class="sb-sidenav-menu-heading">Master</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#barang" aria-expanded="false" aria-controls="barang">
                        <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                        Barang
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="barang" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('barang/stok') ?>">Stok</a>
                            <a class="nav-link" href="<?= base_url('barang/masuk') ?>">Barang Masuk</a>
                            <a class="nav-link" href="<?= base_url('barang/keluar') ?>">Barang Keluar</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Laporan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('laporan/stok') ?>">Stok Barang</a>
                            <a class="nav-link" href="<?= base_url('laporan/masuk') ?>">Barang Masuk</a>
                            <a class="nav-link" href="<?= base_url('laporan/keluar') ?>">Barang Keluar</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <h5><?= $user['nama']; ?></h5>
                <span class="small"><?= $user['role']; ?></span>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-3">