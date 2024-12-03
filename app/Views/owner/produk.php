<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <ili class="h3 mb-2 text-gray-800">Daftar Fasilitas / Paket</ili>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Fasilitas / Paket</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url() ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Buat Pesanan Baru</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Atas Nama</th>
                            <th>Tanggal Kedatangan</th>
                            <th>Tanggal Selesai</th>
                            <th>Durasi</th>
                            <th>Nama Tempat Camping</th>
                            <th>Total Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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