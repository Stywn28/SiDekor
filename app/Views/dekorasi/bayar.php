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
            <h4>Daftar Pembayaran Dekorasi Anda</h4>
                
                <div class="card-body">
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Dekorasi</th>
                            <th scope="col">Total</th>
                            <th scope="col">Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pesan as $data) :
                        ?>

                            <tr>
                                <td scope="row"><?= $no; ?></td>
                                <td><?= $data->nama_dekor; ?></td>
                                <td><?= $data->total; ?></td>
                                <td><a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/<?= $data->snap; ?>" target="_blank" ></a></td>
                                
                            </tr>

                        <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                
            </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>