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
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
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
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $mask['id_maskapai']; ?>">
                <div class="form-group">
                  <label for="namamaskapai">Nama Maskapai</label>
                  <input type="text" class="form-control col-md-8" id="namamaskapai" name="namamaskapai" placeholder="Enter Nama Maskapai" value="<?= $mask['nama_maskapai']; ?>">
                  <small class="form-text text-danger"><?= form_error('namamaskapai'); ?></small>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('maskapai'); ?>" class="btn btn-default">Cancel</a>
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