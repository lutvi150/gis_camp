<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php $session = \Config\Services::session(); ?>

<?php if ($session->get('role') == 'administrator') {
    $root = 'admin';
} else {
    $root = 'owner';
} ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('index.php/' . $root . '/produk/add') ?>" class="btn btn-primary mb-3">Tambah Produk</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Nama Tempat</th>
                            <th>Jumlah tersewa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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