<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url() ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Master</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#barang" aria-expanded="false" aria-controls="barang">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
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
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Laporan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('laporan/masuk') ?>">Barang Masuk</a>
                            <a class="nav-link" href="<?= base_url('laporan/keluar') ?>">Barang Keluar</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <h5>Guntur</h5>
                <h6>Administrator</h6>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-3">