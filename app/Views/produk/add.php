<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php $session = \Config\Services::session(); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Produk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
        </div>
        <div class="card-body">
            <form action="" id="form-produk" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-danger e-nama_produk"></small>
                </div>
                <div class="form-group">
                    <label for="">Jenis</label>
                    <select name="jenis" class="form-control" id="jenis">
                        <option value="">Pilih Jenis</option>
                        <option value="1">Paket</option>
                        <option value="2">Peralatan</option>
                    </select>
                    <small id="helpId" class="text-danger e-jenis"></small>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-danger e-harga"></small>
                </div>
                <?php if ($session->get('role') == 'administrator'): ?>
                    <div class="form-group">
                        <label for="">Nama Tempat Camping</label>
                        <select name="tempat_camping" class="form-control" id="tenpat_camping">
                            <option value="">Pilih Nama Tempat camping</option>
                            <?php foreach ($nama_tempat as $key => $value): ?>
                                <option value="<?= $value->id_user ?>"><?= $value->nama_user ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small id="helpId" class="text-danger e-tempat_camping"></small>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                    <small id="helpId" class="text-danger e-deskripsi"></small>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-danger e-foto"></small>
                </div>
                <hr>
                <button type="button" class="btn btn-success " onclick="store_data()">Simpan Produk</button>
            </form>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    <?php if ($session->get('role') == 'administrator') {
        $root = 'admin';
    } else {
        $root = 'user';
    } ?>
    store_data = () => {
        $(".text-danger").text('');
        Notiflix.Loading.hourglass();
        $("#form-produk").ajaxForm({
            type: "POST",
            url: base_url + "<?= $root ?>/produk/add",
            data: "data",
            dataType: "JSON",
            success: function(response) {
                Notiflix.Loading.remove();
                if (response.status == 'success') {
                    $.each(response.message, function(index, array) {
                        $(".e-" + index).text(array);
                    });
                } else if (response.status == 'success') {
                    Notiflix.Report.success(
                        'Konfirmasi',
                        'Login berhasil, lanjutkan ke dashboard ?',
                        'Ok',
                        function cb() {
                            $("#form-produk").trigger("reset");
                        },
                    );
                } else {
                    Notiflix.Report.failure(
                        'Notiflix Failure',
                        `${response.message}`,
                        'Okay',
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
        }).submit();
    }
</script>
<?= $this->endSection(); ?>