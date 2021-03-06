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
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control col-md-6" id="nama" name="nama" placeholder="Enter Nama">
                  <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                  <label for="user">Username</label>
                  <input type="text" class="form-control col-md-3" id="user" name="user" placeholder="Enter Username">
                  <small class="form-text text-danger"><?= form_error('user'); ?></small>
                </div>
                <div class="form-group">
                  <label for="passwrd">Password</label>
                  <input type="text" class="form-control col-md-4" id="passwrd" name="passwrd" placeholder="Enter Password">
                  <small class="form-text text-danger"><?= form_error('passwrd'); ?></small>
                </div>
                <div class="form-group">
                  <label for="instansi">Instansi Pemerintah</label>
                  <select class="form-control col-md-10 select2bs4" name="instansi">
                    <option value="0">-</option>
                    <?php foreach ($opd as $pd) : ?>
                      <option value="<?= $pd['idopd']; ?>"><?= $pd['namaopd']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('instansi'); ?></small>
                </div>
                <div class="form-group">
                  <label for="roleusr">Role User</label>
                  <select class="form-control col-md-4 select2bs4" name="roleusr">
                    <option value="0">-</option>
                    <?php foreach ($role as $r) : ?>
                      <option value="<?= $r['id_role']; ?>"><?= $r['role']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('roleusr'); ?></small>
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
                <a href="<?= base_url('user'); ?>" class="btn btn-default">Cancel</a>
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