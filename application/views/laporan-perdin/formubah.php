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
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $lapdin['id_laporan_perdin']; ?>">
                <div class="form-group">
                  <label for="kelasjbtn">Kelas Jabatan</label>
                  <select class="form-control col-md-6 select2bs4" name="kelasjbtn">
                    <option value="0">-</option>
                    <?php foreach ($perdin as $p) : ?>
                      <?php if ($p['id_perdin'] == $lapdin['id_perdin']) : ?>
                        <option value="<?= $p['id_perdin']; ?>" selected><?= $p['jabatan']; ?></option>
                      <?php else : ?>
                        <option value="<?= $p['id_perdin']; ?>"><?= $p['jabatan']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('kelasjbtn'); ?></small>
                </div>
                <div class="form-group">
                  <label for="dana">Dana</label>
                  <select class="form-control col-md-4 select2bs4" name="dana">
                    <option value="0">-</option>
                    <?php foreach ($dana as $d) : ?>
                      <?php if ($d['id_dana'] == $lapdin['id_dana']) : ?>
                        <option value="<?= $d['id_dana']; ?>" selected><?= "Rp " . number_format($d['dana'], 0, ',', '.'); ?></option>
                      <?php else : ?>
                        <option value="<?= $d['id_dana']; ?>"><?= "Rp " . number_format($d['dana'], 0, ',', '.'); ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('dana'); ?></small>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('laporperdin'); ?>" class="btn btn-default">Cancel</a>
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