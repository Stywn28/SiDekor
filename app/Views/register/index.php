<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registrasi Akun</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Register</h3>
              
              <form class="forms-sample" action="<?= base_url('login/save') ?>" method="post">
                <?= csrf_field(); ?>
                <?php $validation = \Config\Services::validation(); ?>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                  <small class="text-danger text-center"><?= $validation->getError('nama') ?></small>
                </div>
                <div class="form-group">
                  <label>No Ponsel</label>
                  <input type="text" class="form-control" name="ponsel" value="<?= set_value('ponsel') ?>">
                  <small class="text-danger text-center"><?= $validation->getError('ponsel') ?></small>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                  <small class="text-danger text-center"><?= $validation->getError('email') ?></small>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password') ?>">
                  <small class="text-danger text-center"><?= $validation->getError('password') ?></small>
                </div>
                <div class="form-group">
                  <label>Ulang Password</label>
                  <input type="password" class="form-control" name="ulpass" placeholder="Ulang Password" value="<?= set_value('ulpass') ?>">
                  <small class="text-danger text-center"><?= $validation->getError('ulpass') ?></small>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="<?= base_url('login/index'); ?>" class="btn btn-dark">Cancel</a>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url() ?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>/assets/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>/assets/js/hoverable-collapse.js"></script>
  <script src="<?= base_url() ?>/assets/js/misc.js"></script>
  <script src="<?= base_url() ?>/assets/js/settings.js"></script>
  <script src="<?= base_url() ?>/assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>