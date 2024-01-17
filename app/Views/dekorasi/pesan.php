<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
function buatRp($angka)
{
    // Konversi nilai menjadi float jika awalnya berupa string
    $angka = floatval($angka);

    $hasil = "Rp." . number_format($angka, 2, ',', '.');
    return $hasil;
}
?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="row">
            
            <div class="col-md-6 mx-auto" style="padding-top: 10px;">
                <div class="card" style="padding: 10px;">

                    <img src="<?= base_url('gambar/' . $dekorasi->gambar); ?>" style="height: 300px;" class="card-img-top" alt="">
                </div>
                <div class="card-body">
                    <h3 class="card-title text-center">Pesan <?= $dekorasi->nama_dekor; ?></h3>
                    <p style="text-align: center;">Biaya : <?= buatRp($dekorasi->harga); ?>/Hari</p>
                    <input type="hidden" name="harga" value="<?= $dekorasi->harga; ?>">
                    <input type="hidden" name="id" value="<?= $dekorasi->id_dekor; ?>">
                    <?= csrf_field(); ?>
                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?= base_url('dekorasi/proses') ?>" method="post">
                        <div class="mb-3">
                            <label>Lama Penyewaan</label>
                            <input type="text" class="form-control" name="lama" value="<?= set_value('lama') ?>">
                            <small class="text-center text-danger "><?= $validation->getError('lama') ?></small>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Pesan Acara</label>
                            <input type="date" class="form-control" name="tanggal" value="<?= set_value('tanggal') ?>">
                            <small class="text-center text-danger "><?= $validation->getError('tanggal') ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Pesan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>