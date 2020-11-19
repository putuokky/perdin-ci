<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $judul; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('log/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <!-- general form elements -->
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title"><?= $subjudul; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="menu">Menu</label>
                  <input type="text" class="form-control" id="menu" name="menu" placeholder="Enter Menu">
                  <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                </div>
                <div class="form-group">
                  <label for="urutan">Urutan</label>
                  <input type="text" class="form-control col-md-2" id="urutan" name="urutan" placeholder="Enter Urutan">
                  <small class="form-text text-danger"><?= form_error('urutan'); ?></small>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Status</label>
                  <div class="input-group">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" value="1" id="status" name="status" checked>
                      <label class="form-check-label" for="status">Aktif</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('log/menu'); ?>" class="btn btn-default">Cancel</a>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->