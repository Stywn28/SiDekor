<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Ubah Data Petugas</h3>

                <form class="forms-sample" action="<?= base_url('admin/petugas/update') ?>" method="post" >
                <?= csrf_field(); ?>
                <input type="hidden" name="kode" value="<?= $cari->id_admin; ?>" >
                <?php $validation = \Config\Services::validation(); ?>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?= $cari->nama; ?>" >
                        <small class="text-danger text-center"><?= $validation->getError('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $cari->email; ?>" >
                        <small class="text-danger text-center"><?= $validation->getError('email') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password') ?>">
                        <small class="text-danger text-center"><?= $validation->getError('password') ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center;" >Si Admin</h4>
                <div class="item">
                        <img src="<?= base_url() ?>/assets/images/mboh.jpg" alt="" style="max-width: 100%; height: auto;" >
                      </div>
                      <div class="d-flex py-4">
                      <h6>Marsha Lenathea Lapian</h6>
                      </div>
            </div>
        </div>
    </div> -->
</div>

<?= $this->endSection(); ?>