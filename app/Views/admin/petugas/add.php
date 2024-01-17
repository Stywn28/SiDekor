<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Tambah Petugas</h3>

                <form class="forms-sample" action="<?= base_url('admin/petugas/save') ?>" method="post" >
                <?= csrf_field(); ?>
                <?php $validation = \Config\Services::validation(); ?>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" >
                        <small class="text-danger text-center"><?= $validation->getError('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email') ?>" >
                        <small class="text-danger text-center"><?= $validation->getError('email') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password') ?>">
                        <small class="text-danger text-center"><?= $validation->getError('password') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Ulang Password</label>
                        <input type="password" class="form-control" name="ulpass" placeholder="Ulang Password" value="<?= set_value('ulpass') ?>" >
                        <small class="text-danger text-center"><?= $validation->getError('ulpass') ?></small>
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