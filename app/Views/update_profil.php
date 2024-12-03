<?= $this->include('layout/head') ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session('nama_user') ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('upload/profil.jpg') ?>">
                            </a>
                            <!-- Dropdow -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!--End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Isi Data Diri Anda</h1>

                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Formulir Data Diri
                                </div>
                                <div class="card-body">
                                    <form action="" id="form-data-diri" enctype="multipart/form-data" method="post">
                                        <div class="alert alert-info" role="alert">
                                            <strong>Selamat Datang</strong>
                                            <p>Sebelum menggunakan aplikasi silahkan isi data diri anda dengan lengkap dan benar.</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="" aria-describedby="helpId">
                                            <small id="helpId" class="text-danger e-nama_user"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor Kontak</label>
                                            <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" placeholder="" aria-describedby="helpId">
                                            <small id="helpId" class="text-danger e-nomor_hp"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Provinsi Asal</label>
                                            <select name="provinsi" class="form-control" onchange="get_location('kab', this.value)" id="provinsi"></select>
                                            <small id="helpId" class="text-danger e-provinsi"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kabupaten</label>
                                            <select name="kabupaten" class="form-control" onchange="get_location('kec', this.value)" id="kabupaten"></select>
                                            <small id="helpId" class="text-danger e-kabupaten"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kecamatan</label>
                                            <select name="kecamatan" class="form-control" onchange="get_location('des', this.value)" id="kecamatan"></select>
                                            <small id="helpId" class="text-danger e-kecamatan"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Desa</label>
                                            <select name="desa" class="form-control" id="desa"></select>
                                            <small id="helpId" class="text-danger e-desa"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Detail Alamat</label>
                                            <textarea name="alamat" class="form-control" id="alamat"></textarea>
                                            <small id="helpId" class="text-danger e-alamat"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanda Pengenal</label>
                                            <input type="file" name="tanda_pengenal" class="form-control" id="tanda_pengenal">
                                            <small id="helpId" class="text-danger e-tanda_pengenal">Tipe File adalah JPG, JPEG, PNG, atau PDF</small>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="button" onclick="simpan_data_diri()" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Simpan Data Diri</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?= getenv('app_author') . " " . date('Y') ?> </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih logout untuk mengakhiri sesi Anda.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('index.php/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('layout/script') ?>
</body>
<script>
    $(document).ready(function() {
        get_location('prov', '');
    });

    get_location = (jenis, id) => {
        Notiflix.Loading.hourglass();
        sessionStorage.setItem('jenis', jenis);
        sessionStorage.setItem('id', id);
        if (jenis == 'prov') {
            id_filter = '0';
        } else if (jenis == 'kab') {
            id_filter = $('#provinsi').children("option:selected").val();
        } else if (jenis == 'kec') {
            id_filter = $('#kabupaten').children("option:selected").val();
        } else if (jenis == 'des') {
            id_filter = $('#kecamatan').children("option:selected").val();
        }
        $.ajax({
            type: "POST",
            url: base_url + "location",
            data: {
                jenis: jenis,
                id: id,
                id_filter: id_filter,
            },
            dataType: "JSON",
            success: function(response) {
                Notiflix.Loading.remove();
                if (response.status == 'failed') {
                    Notiflix.Notify.failure('Kendala dengan sistem anda');
                } else if (response.status == 'success') {
                    Notiflix.Notify.success('Data ditemukan');
                    let jenis = sessionStorage.getItem('jenis');
                    let html = '';
                    $.each(response.data, function(indexInArray, valueOfElement) {
                        html += `<option value="${valueOfElement.id}">${valueOfElement.name}</option>`;
                    });
                    let select = "";
                    let id_select = "";
                    if (jenis == 'prov') {
                        id_select = 'provinsi';
                    } else if (jenis == 'kab') {
                        id_select = 'kabupaten';
                    } else if (jenis == 'kec') {
                        id_select = 'kecamatan';
                    } else if (jenis == 'des') {
                        id_select = 'desa';
                    }
                    select = `<option>Pilih ${id_select}</option>`;
                    $("#" + id_select).html(select + html);
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
    simpan_data_diri = () => {
        Notiflix.Loading.hourglass();
        $(".text-danger").text('');
        $(".e-tanda_pengenal").text('Tipe File adalah JPG, JPEG, PNG, atau PDF');
        $("#form-data-diri").ajaxForm({
            type: "POST",
            url: base_url + "update-profil",
            dataType: "JSON",
            success: function(response) {
                Notiflix.Loading.remove();
                if (response.status == 'validation_failed') {
                    $.each(response.message, function(index, array) {
                        $(".e-" + index).text(array);
                    });
                } else if (response.status == 'success') {
                    Notiflix.Report.success(
                        'Konfirmasi',
                        'Update Berhasil, berpindah ke halaman dashboard ?',
                        'Ok',
                        function cb() {
                            window.location.href = base_url + "login";
                        },
                    );
                } else {
                    Notiflix.Report.failure(
                        'Error',
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

</html>