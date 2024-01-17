<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Daftar Dekorasi</h2>
            <a href="<?= base_url('admin/dekorasi/add') ?>" class="btn btn-md btn-primary" >Tambah Data</a>
            </p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Dekorasi</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dekorasi as $data) :
                        ?>

                            <tr>
                                <td scope="row"><?= $no; ?></td>
                                <td><?= $data->nama_dekor; ?></td>
                                <td><?= $data->deskripsi; ?></td>
                                <td><?= $data->harga; ?></td>
                                <td><img src="<?= base_url('../gambar/'.$data->gambar); ?>" style="width: 200px; height: 100px; " alt="" ></td>
                                <td>
                                    <a href="<?= base_url('admin/dekorasi/edit/' . $data->id_dekor); ?>" class="btn btn-sm btn-success" >Edit</a>
                                    <a href="<?= base_url('admin/dekorasi/delete/' . $data->id_dekor) ?>" class="btn btn-sm btn-danger" >Hapus</a>
                                </td>
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
<?= $this->endSection(); ?>