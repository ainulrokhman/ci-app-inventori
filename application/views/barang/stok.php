<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Stok Barang</h2>
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
            <table id="tabel_stok" class="display">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $d['nama_barang'] ?></td>
                            <td><?= $d['merk'] ?></td>
                            <?php if ($d['total']) : ?>
                                <td><?= $d['total'] ?></td>
                            <?php else : ?>
                                <td class="text-danger">Kosong</td>
                            <?php endif; ?>
                            <td>
                                <a href="#" data-id="<?= $d['id'] ?>" class="edit badge bg-info text-decoration-none" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i title="Edit" class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url("barang/hapusbarang/${d['id']}") ?>" onclick="return confirm('Yakin untuk menghapus?')" class="badge bg-danger text-decoration-none">
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
            <form action="<?= base_url("barang/addbarang") ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Nama Barang</label>
                        <div class="col-sm-8">
                            <input name="nama_barang" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Merk</label>
                        <div class="col-sm-8">
                            <input name="merk" type="text" class="form-control">
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
            <form action="<?= base_url("barang/updatebarang") ?>" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-4 col-form-label">Nama Barang</label>
                        <div class="col-sm-8">
                            <input name="nama_barang" type="text" class="form-control" id="nama_barang">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-4 col-form-label">Nama Barang</label>
                        <div class="col-sm-8">
                            <input name="merk" type="text" class="form-control" id="merk">
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