<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Data Stok Barang</h2>
        </div>
        <div class="card-body">
            <table id="tabel-laporan" class="display">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $d['nama_barang'] ?></td>
                            <?php if ($d['total']) : ?>
                                <td><?= $d['total'] ?></td>
                            <?php else : ?>
                                <td class="text-danger">Kosong</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>