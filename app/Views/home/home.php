<?= $this->extend('home/template') ?>
<?= $this->section('content') ?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Daftar Tempat Camping</h1>
                    <p>Silahkan pilih fasilitas yang anda inginkan untuk menemukan tempat camping yang sesuai dengan keinginan anda.</p>
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
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.<?= $key + 1 ?>s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="<?= base_url() ?><?= $value->foto ?> image-camp" src="<?= base_url() ?><?= $value->foto ?>" alt=""></a>
                                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Camping</div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Wisata Camping</div>
                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="text-primary mb-3">Mulai Dari Rp. 100.000</h5>
                                    <a class="d-block h5 mb-2" href=""><?= $value->nama_tempat ?></a>
                                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?= $value->lokasi ?></p>
                                </div>
                                <div class="border-top text-center">
                                    <a href="<?= base_url('detail/') . $value->id_user ?>" class="btn btn-primary rounded-pill py-2 me-3"><i class="fa fa-phone-alt me-2"></i>Pesan</a>
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