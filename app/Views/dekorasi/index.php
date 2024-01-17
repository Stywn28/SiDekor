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
            <h1 style="text-align: center; padding-top: 10px;">Daftar Dekorasi</h1>
            <?php foreach ($dekorasi as $data) : ?>
                <div class="col-md-4" style="padding-top: 10px;">
                    <div class="card" style="padding: 10px;">
                        <img src="<?= base_url('gambar/' . $data->gambar); ?>" style="height: 300px;" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-center"><?= $data->nama_dekor; ?></h3>
                        <h4><?= $data->deskripsi; ?></h4>
                        <h4>Biaya : <?= buatRp($data->harga); ?></h4>
                        <a href="<?= base_url('dekorasi/pesan/' . $data->id_dekor); ?>" class="btn btn-outline-success">Pesan</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>