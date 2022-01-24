<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Data Barang Keluar</h2>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('notify'); ?>
            <table id="tabel-laporan" class="display">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Jumlah</th>
                        <th>Sumber dana</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $d['tgl'] ?></td>
                            <td><?= $d['nama_barang'] ?></td>
                            <td><?= $d['merk'] ?></td>
                            <td><?= $d['jml'] ?></td>
                            <td><?= $d['sumber_dana'] ?></td>
                            <td><?= $d['keterangan'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>