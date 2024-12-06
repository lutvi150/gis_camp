<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pesanan Anda</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $harga = 0;
                        foreach ($keranjang as $key => $value): ?>
                            <?php
                            $harga += $value->total_harga; ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nama_produk ?></td>
                                <td>Rp. <?= number_format($value->harga, 0, ',', '.') ?></td>
                                <td><input onchange="updateTotal(<?= $value->id_keranjang ?>)" type="number" class="form-control" id="jumlah_<?= $value->id_keranjang ?>" value="<?= $value->jumlah ?>"></td>
                                <td>Rp. <?= number_format($value->total_harga, 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>Rp.<?= number_format($harga, 0, ',', '.') ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">Proses Pembayaran</a>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    updateTotal = (id) => {
        console.log(id);

    }
</script>
<?= $this->endSection(); ?>