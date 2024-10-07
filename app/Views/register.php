<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url('upload/favicon.ico') ?>" type="image/x-icon">
    <title><?= $title . " " . getenv('app_name') ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>theme/2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>theme/2/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/notiflix/dist/notiflix-3.2.7.min.css">
    <style>
        .bg-register-image {
            background: url("<?= base_url('upload/logo.jpg') ?>") !important;
            background-repeat: no-repeat !important;
            width: 100%;
            background-position: center;
            background-size: cover !important;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Baru!</h1>
                            </div>
                            <form id="form-register" class="user">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        placeholder="Email Address">
                                    <span class="text-danger e-email"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        placeholder="Password">
                                    <span class="text-danger e-password"></span>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="try_password" name="try_password"
                                        placeholder="Ulangi Password">
                                    <span class="text-danger e-try_password"></span>
                                </div>
                                <button type="button" onclick="register()" class="btn btn-primary btn-user btn-block">
                                    Buat Account
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login') ?>">Sudah Punya Akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>theme/2/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>theme/2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>theme/2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>theme/2/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url() ?>assets/form-master/dist/jquery.form.min.js"></script>
    <script src="<?= base_url() ?>assets/notiflix/dist/notiflix-3.2.7.min.js"></script>
    <script>
        let url = "<?= base_url() ?>"
        register = () => {
            $(".text-danger").text('');
            Notiflix.Loading.hourglass();
            $.ajax({
                type: "POST",
                url: url + "register",
                data: {
                    email: $("#email").val(),
                    password: $("#password").val(),
                    try_password: $("#try_password").val(),
                },
                dataType: "JSON",
                success: function(response) {
                    Notiflix.Loading.remove();
                    if (response.status == 'validation_failed') {
                        $.each(response.message, function(index, array) {
                            $(".e-" + index).text(array);
                        });
                    } else if (response.status == 'success') {
                        Notiflix.Report.success(
                            'Daftar berhasil',
                            'Klik ok untuk lanjut ke halaman berikutnya',
                            'ok',
                        );
                        $("#form-register").trigger("reset");
                    } else {
                        $(".e-email").text(response.message);
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
</body>

</html>