<?= $this->extend('home/template') ?>
<?= $this->section('content') ?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Daftar Produk Camping <?= $title ?></h1>
                    <p>Silahkan pilih fasilitas yang anda inginkan untuk sesuai dengan keinginan anda.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Harga Terendah</a>
                    </li>
                    <!-- <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                        </li> -->
                </ul>
            </div>
        </div>
        <style>
            .image-camp {
                width: 400px;
                height: 600px;
                object-fit: cover;
            }
        </style>
        <div class="tab-content">

            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <?php foreach ($camping as $key => $value): ?>
                        <?php $jenis = $value->jenis == 1 ? "Paket" : "Peralatan" ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.<?= $key + 1 ?>s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="<?= base_url() ?><?= $value->foto ?> image-camp" src="<?= base_url('uploads/produk/') ?><?= $value->foto ?>" alt=""></a>
                                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?= $jenis ?></div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Wisata Camping</div>
                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="text-primary mb-3">Rp. <?= number_format($value->harga) ?></h5>
                                    <a class="d-block h5 mb-2" href=""><?= $value->nama_produk ?></a>
                                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?= $value->deskripsi ?></p>
                                </div>
                                <div class="border-top text-center">
                                    <button type="button" onclick="keranjang(<?= $value->id_produk ?>)" class="btn btn-primary rounded-pill py-2 me-3"><i class="fa fa-phone-alt me-2"></i>Keranjang</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="">Cari Lebih Banyak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    check_keranjang = () => {
        
    }
    keranjang = (id) => {
        Notiflix.Loading.hourglass();
        $.ajax({
            type: "POST",
            url: base_url + "user/keranjang/add",
            data: {
                id_produk: id
            },
            dataType: "JSON",
            success: function(response) {
                Notiflix.Loading.remove();
                if (response.status == 'success') {
                    Notiflix.Report.success(
                        'Konfirmasi',
                        'Login berhasil, lanjutkan ke dashboard ?',
                        'Ok',
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
        });
    }
</script>
<?= $this->endSection() ?>