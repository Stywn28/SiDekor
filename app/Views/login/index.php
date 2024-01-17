
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login User</title>
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
                <?php if (session()->getFlashdata('error')) { ?>
                    <div class="alert alert-danger" role="alert" >
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php
                } ?>
                <h3 class="card-title text-left mb-3" style="text-align: center;" >Login Users</h3>
                
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= base_url('login/proses'); ?>" method="POST" >
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>" >
                    <small class="text-danger text-center"><?= $validation->getError('email'); ?></small>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>" >
                    <small class="text-danger text-center"><?= $validation->getError('password'); ?></small>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg enter-btn">Login</button>
                  </div>
                  <div class="text-center">
                  <a href="<?= base_url('login/register') ?>" class="btn btn-outline-primary btn-md enter-btn" >Registrasi Akun</a>
                  <a href="<?= $link ?>" class="btn btn-outline-primary btn-md enter-btn" >Login Dengan Google</a>
                  </div>
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