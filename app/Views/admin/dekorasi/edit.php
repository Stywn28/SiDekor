<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Ubah Dekorasi</h3>

                <form class="forms-sample" action="<?= base_url('admin/dekorasi/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="kode" value="<?= $cari->id_dekor; ?>" >
                    <div class="form-group">
                        <label>Nama Dekorasi</label>
                        <input type="text" class="form-control" name="nama_dekorasi" value="<?= $cari->nama_dekor; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi"  value="<?= $cari->deskripsi; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga"  value="<?= $cari->harga; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" >
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
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