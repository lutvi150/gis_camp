<?= $this->include('home/head') ?>
<style>
    .sup {
        font-size: 0.6em;
        vertical-align: super;
        margin-left: 4px;
    }
</style>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="<?= base_url() ?>theme/1/img-fluid" src="<?= base_url() ?>theme/1/img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Camp</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="<?= base_url() ?>" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link" onclick="show_load();">Tentang</a>
                        <a href="#" class="nav-item nav-link" onclick="show_load();">Cari Di Map</a>
                        <a href="#" class="nav-item nav-link" onclick="show_load();">Kontak</a>
                    </div>
                    <a id="keranjang" href="<?= base_url('index.php/user/cart') ?>" class="btn btn-primary px-3 d-none d-lg-flex m-3">Keranjang </a>
                    <?php if (session('login') == true): ?>
                        <?php if (session('role') == 'administrator') {
                            $url = 'index.php/administrator';
                        } elseif (session('role') == 'user') {
                            $url = 'index.php/user';
                        } else {
                            $url = 'index.php/owner';
                        } ?>
                        <a href="<?= base_url($url) ?>" class="btn btn-primary px-3 d-none d-lg-flex"><?= session('nama_user') ?></a>
                        <a href="<?= base_url('index.php/logout') ?>" class="btn btn-primary m-3 px-3 d-none d-lg-flex">Logout</a>

                    <?php else: ?>
                        <a href="<?= base_url('login') ?>" class="btn btn-primary px-3 d-none d-lg-flex">Login</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <?php if ($title == 'Home'): ?>
            <!-- <div class="container-fluid header bg-white p-0"> -->
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Ingin Berwisata <span class="text-primary">Camping</span> di Takengon</h1>
                    <p class="animated fadeIn mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet
                        Wisata Camping di tempat nyaman bersih dan berada di pinggir danau Lur Tawar adalah salah satu cara untuk menikmati liburan anda dengan nyaman</p>
                    <a href="<?= base_url('login') ?>" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Pesan</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <?php foreach ($owl as $key => $value): ?>
                            <div class="owl-carousel-item">
                                <img class="<?= base_url($value) ?>" src="<?= base_url($value) ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- Header End -->


    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0 py-3" placeholder="Cari dengan kata kunci">
                        </div>
                        <div class="col-md-4">
                            <input class="form-select border-0 py-3">
                            </input>
                        </div>
                        <div class="col-md-4">
                            <input class="form-select border-0 py-3">
                            </input>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100 py-3">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->

    <!-- Property List Start -->
    <?= $this->renderSection('content') ?>
    <!-- Property List End -->
    <?php if ($title == 'Home'): ?>
        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Testimonial!</h1>
                    <p>Berikut adalah testimoni dari para pengguna yang telah menggunakan layanan kami.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <?php foreach ($testimoni as $key => $value): ?>
                        <div class="testimonial-item bg-light rounded p-3">
                            <div class="bg-white border rounded p-4">
                                <p><?= $value->testimoni ?></p>
                                <div class="d-flex align-items-center">
                                    <img class="<?= base_url($value->foto) ?>img-fluid flex-shrink-0 rounded" src="<?= base_url($value->foto) ?>" style="width: 45px; height: 45px;">
                                    <div class="ps-3">
                                        <h6 class="fw-bold mb-1"><?= $value->nama ?></h6>
                                        <small><?= $value->alamat ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Lokasi</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Takengon Kabupaten Aceh Tengah</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0822-9134-5014</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>infog@campingtakengon.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#"><?= getenv('app_name') ?></a> All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="#">Riadi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>theme/1/lib/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>theme/1/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>theme/1/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>theme/1/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>theme/1/js/main.js"></script>
    <script src="<?= base_url() ?>assets/notiflix/dist/notiflix-3.2.7.min.js"></script>
    <script>
        let base_url = "<?= base_url('index.php/') ?>";
        show_load = () => {
            Notiflix.Loading.hourglass();
        }
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>