<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Tambah Dekorasi</h3>

                <form class="forms-sample" action="<?= base_url('admin/dekorasi/save') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php $validation = \Config\Services::validation(); ?>
                    <div class="form-group">
                        <label>Nama Dekorasi</label>
                        <input type="text" class="form-control" name="nama_dekorasi" placeholder="Nama Dekorasi" value="<?= old('nama_dekorasi') ?>" >
                        <small class="text-danger text-center"><?= $validation->getError('nama_dekorasi') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" value="<?= old('deskripsi') ?>" >
                        <small class="text-danger text-center"><?= $validation->getError('deskripsi') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" placeholder="Harga" value="<?= old('harga') ?>" >
                        <small class="text-danger text-center"><?= $validation->getError('harga') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" placeholder="Gambar" value="<?= old('gambar') ?>" >
                        <small class="text-danger text-center"><?= $validation->getError('gambar') ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    
</div>

<?= $this->endSection(); ?>