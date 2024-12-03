<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pengguna yang terdaftar pada sistem</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pengguna</th>
                            <th>Email Pengguna</th>
                            <th>Status Akun</th>
                            <th>Level Akses</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengguna as $key => $value): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nama_user ?></td>
                                <td><?= $value->email ?></td>
                                <td>
                                    <?php if ($value->profil_status == 'aktif'): ?>
                                        <button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Aktif</button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Tidak Aktif</button>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($value->role == 'user'): ?>
                                        <button type="button" class="btn btn-sm btn-success"> Wisatawan</button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-sm btn-info">Pemilik Tempat</button>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d F Y', strtotime($value->created_at)) ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    <?php if ($value->profil_status == 'aktif'): ?>
                                        <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button>
                                    <?php endif; ?>
                                    <button type="button" onclick="reset_password(<?= $value->id_user ?>)" class="btn btn-sm btn-info"><i class="fa fa-key"></i>Reset Password</button>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- model reset password -->
<div class="modal fade" id="modal-reset-password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-reset-password" method="post">
                    <div class="form-group">
                        <label for="">Password Baru</label>
                        <input type="text" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-danger e-password"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="reset_password_action()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    // use for reset password
    reset_password = (id) => {
        sessionStorage.setItem('id_user', id);
        $("#modal-reset-password").modal('show');
    }
    reset_password_action = () => {
        $(".text-danger").text('');
        Notiflix.Loading.hourglass();
        $.ajax({
            type: "POST",
            url: base_url + "admin/user-reset-password",
            data: {
                id_user: sessionStorage.getItem('id_user'),
                password: $("#password").val()
            },
            dataType: "JSON",
            success: function(response) {
                $("#password").val('');
                Notiflix.Loading.remove();
                if (response.status == 'validation_failed') {
                    $.each(response.message, function(index, array) {
                        $(".e-" + index).text(array);
                    });
                } else if (response.status == 'success') {
                    Notiflix.Report.success(
                        'Reset Password berhasil',
                        'Klik untuk lanjut',
                        'Ok',
                    );
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                Notiflix.Loading.remove();
                Notiflix.Report.failure(
                    'Error',
                    `${xhr.responseJSON.message}`,
                    'Okay',
                );
            }
        });
    }
</script>
<?= $this->endSection(); ?>