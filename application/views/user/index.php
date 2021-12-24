<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Manajemen User</h2>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#input">
                            <i title="Edit" class="fas fa-plus"></i> Input User
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <?= $this->session->flashdata('notify'); ?>
            <table id="tabel-user" class="display">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $d['nama_lengkap']; ?></td>
                            <td><?= $d['username']; ?></td>
                            <td><?= $d['role']; ?></td>
                            <td>
                                <a href="#" data-id="<?= $d['id'] ?>" class="edit badge bg-info text-decoration-none" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i title="Edit" class="fas fa-edit"></i>
                                </a>
                                <?php if ($d['role'] != "Administrator") : ?>
                                    <a href="<?= base_url("user/delete/${d['id']}") ?>" onclick="return confirm('Yakin untuk menghapus?')" class="badge bg-danger text-decoration-none">
                                        <i title="Hapus" class="fas fa-trash"></i>
                                    </a>
                                <?php endif; ?>
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
            <form action="<?= base_url("user/add") ?>" method="post">
                <input type="hidden" name="role_id" value="2">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input name="nama_lengkap" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input name="username" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-2 mr-sm-2">
                                <input name="password" type="password" class="form-control password" value="123">
                                <div class="input-group-append py-2">
                                    <div class="input-group-text togglePassword" id="">
                                        <i class="fa fa-eye-slash" id="eye2"></i>
                                    </div>
                                </div>
                            </div>
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
            <form action="<?= base_url("user/update") ?>" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Form User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input name="username" type="text" class="form-control" id="username">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="password" class="form-control password" id="password" placeholder="Username">
                                <div class="input-group-append py-2">
                                    <div class="input-group-text togglePassword" id="">
                                        <i class="fa fa-eye-slash" id="eye1"></i>
                                    </div>
                                </div>
                            </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // datatable
        $('#tabel-user').DataTable();

        // show off password
        $('.togglePassword').on('click', function() {
            var type = $("#password").attr("type");
            if (type === "password") {
                $(".password").attr("type", "text");
                $("#eye1").attr("class", "fa fa-eye");
                $("#eye2").attr("class", "fa fa-eye");
            } else {
                $(".password").attr("type", "password");
                $("#eye1").attr("class", "fa fa-eye-slash");
                $("#eye2").attr("class", "fa fa-eye-slash");
            }
        });
    });


    // edit data
    $(".edit").on("click", function() {
        var id = $(this).data("id");
        console.log(id);

        $.ajax({
            url: "<?= base_url('user'); ?>",
            dataType: "json",
            data: {
                "id": id
            },
            type: "post",
            success: function(data) {
                $("#id").val(data.id);
                $("#nama_lengkap").val(data.nama_lengkap);
                $("#username").val(data.username);
                $("#password").val(data.password);
            }
        });
    })
</script>