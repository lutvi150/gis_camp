<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail tempat Camping Anda</h1>

    </div>

    <div class="row">
        <form action="" id="form-data-diri" enctype="multipart/form-data" method="post"></form>
        <div class="col-lg-6">
            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Detail tempat Camping
                </div>
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        <strong>Selamat Datang</strong>
                        <p>Silahkan Detailkan Tentang Tempat Camping Anda</p>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Tempat Camping</label>
                        <input type="text" name="nama_tempat" id="nama_tempat" class="form-control" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-danger e-nama_tempat"></small>
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
                        <label for="">Foto Tempat Camping</label>
                        <input type="file" name="tanda_pengenal" class="form-control" id="tanda_pengenal">
                        <small id="helpId" class="text-danger e-tanda_pengenal">Tipe File adalah JPG, JPEG, PNG, atau PDF</small>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    Data Spasial
                </div>
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        <strong>Isikan data spasil</strong>
                        <p>Data spasial tempat camping anda</p>
                    </div>
                    <div class="form-group">
                        <label for="">Latitude</label>
                        <input type="text" name="latitude" id="latitude" readonly class="form-control" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-danger e-latitude"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Longitude</label>
                        <input type="text" name="longitude" id="longitude" readonly class="form-control" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-danger e-longitude"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Ketinggian (mdpl)</label>
                        <input type="text" name="ketinggian" id="ketinggain" readonly class="form-control" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-danger e-ketinggian"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Kelembaban</label>
                        <input type="text" name="kelembaban" id="kelembaban" readonly class="form-control" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-danger e-kelembaban"></small>
                    </div>

                </div>
            </div>
            <div class="card mb-4">
                <div class="col-md-12 text-center">
                    <button type="button" onclick="simpan_data_diri()" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Simpan Data Diri</button>
                </div>
            </div>
        </div>
        </form>
    </div>

</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>