<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Data Barang Keluar</h2>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#input">
                            <i title="Edit" class="fas fa-plus"></i> Input Data
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <?= $this->session->flashdata('notify'); ?>
            <table id="tabel-keluar" class="display">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Jumlah</th>
                        <th>Sumber dana</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
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
                            <td>
                                <a href="#" data-id="<?= $d['id'] ?>" class="edit badge bg-info text-decoration-none" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i title="Edit" class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url("barang/hapuskeluar/${d['id']}") ?>" onclick="return confirm('Yakin untuk menghapus?')" class="badge bg-danger text-decoration-none">
                                    <i title="Hapus" class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Input Modal -->
<div class="modal fade" id="input" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url("barang/addkeluar") ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form Barang keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input name="tgl" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="barang" class="col-sm-4 col-form-label">Nama Barang</label>
                        <div class="col-sm-8">
                            <select name="id_barang" class="form-select" id="brg">
                                <?php foreach ($barang as $b) : ?>
                                    <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="col-sm-8">
                            <input name="jml" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dana" class="col-sm-4 col-form-label">Sumber Dana</label>
                        <div class="col-sm-8">
                            <input name="sumber_dana" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input name="keterangan" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url("barang/updatekeluar") ?>" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form Barang keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input name="tgl" type="date" class="form-control" id="tanggal">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="barang" class="col-sm-4 col-form-label">Nama Barang</label>
                        <div class="col-sm-8">
                            <select name="id_barang" id="barang" class="form-select">
                                <?php foreach ($barang as $b) : ?>
                                    <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="col-sm-8">
                            <input name="jml" type="text" class="form-control" id="jumlah">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dana" class="col-sm-4 col-form-label">Sumber Dana</label>
                        <div class="col-sm-8">
                            <input name="sumber_dana" type="text" class="form-control" id="dana">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input name="keterangan" type="text" class="form-control" id="keterangan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>