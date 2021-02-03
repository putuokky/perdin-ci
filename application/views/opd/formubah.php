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
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $opd['idopd']; ?>">
                <div class="form-group">
                  <label for="namaopd">Nama Instansi</label>
                  <input type="text" class="form-control col-md-10" id="namaopd" name="namaopd" placeholder="Enter Nama Instansi" value="<?= $opd['namaopd']; ?>">
                  <small class="form-text text-danger"><?= form_error('namaopd'); ?></small>
                </div>
                <div class="form-group">
                  <label for="namapendekopd">Nama Pendek Instansi</label>
                  <input type="text" class="form-control col-md-4" id="namapendekopd" name="namapendekopd" placeholder="Enter Nama Pendek Instansi" value="<?= $opd['nama_pendek_opd']; ?>">
                  <small class="form-text text-danger"><?= form_error('namapendekopd'); ?></small>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('skpd'); ?>" class="btn btn-default">Cancel</a>
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