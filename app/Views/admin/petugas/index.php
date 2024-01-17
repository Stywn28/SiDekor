<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Daftar Petugas</h2>
            <a href="<?= base_url('admin/petugas/add') ?>" class="btn btn-md btn-primary" >Tambah Data</a>
            </p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($petugas as $data) :
                        ?>

                            <tr>
                                <td scope="row"><?= $no; ?></td>
                                <td><?= $data->nama; ?></td>
                                <td><?= $data->email; ?></td>
                                
                                <td>
                                    <a href="<?= base_url('admin/petugas/edit/' . $data->id_admin); ?>" class="btn btn-sm btn-success" >Edit</a>
                                    <a href="<?= base_url('admin/petugas/delete/' . $data->id_admin) ?>" class="btn btn-sm btn-danger" >Hapus</a>
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