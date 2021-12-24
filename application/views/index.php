<h2 class="text-center mt-3">Sistem Informasi Manajemen</h2>
<h2 class="text-center">Inventaris LAB TIK</h2>

<div class='alert alert-info mt-3'>Selamat datang <?= $user['nama']; ?>!.</div>
<div class="container text-center">
	<div class="row">
		<div class="card col-lg-3 mx-auto bg-success">
			<div class="card-header">
				<div class="text-xs font-weight-bold text-light text-uppercase mb-1">
					Total Jenis Barang
				</div>
			</div>
			<div class="card-body">
				<h5 class="font-weight-bold mb-0 text-light"><?= $total_barang; ?> Buah</h5>
			</div>
		</div>
		<div class="card col-lg-3 mx-auto bg-warning">
			<div class="card-header">
				<div class="text-xs font-weight-bold text-uppercase mb-1">
					Transaksi Masuk
				</div>
			</div>
			<div class="card-body">
				<h5 class="font-weight-bold mb-0"><?= $transaksi_masuk; ?> Transaksi</h5>
			</div>
		</div>
		<div class="card col-lg-3 mx-auto bg-danger">
			<div class="card-header">
				<div class="text-xs font-weight-bold text-light text-uppercase mb-1">
					Transaksi Keluar
				</div>
			</div>
			<div class="card-body">
				<h5 class="font-weight-bold mb-0 text-light"><?= $transaksi_keluar; ?> Transaksi</h5>
			</div>
		</div>
	</div>
</div>