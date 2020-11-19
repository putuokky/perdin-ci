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
                  <label for="klasijbtn">Klasifikasi Jabatan</label>
                  <select class="form-control col-md-6 select2bs4" name="klasijbtn">
                    <option value="0">-</option>
                    <?php foreach ($klasijbtn as $kljb) : ?>
                      <option value="<?= $kljb['kode_kj']; ?>"><?= $kljb['jabatan']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('klasijbtn'); ?></small>
                </div>
                <div class="form-group">
                  <label for="anggaran">Tahapaan Anggaran</label>
                  <select class="form-control col-md-2 select2bs4" name="anggaran">
                    <option value="0">-</option>
                    <?php foreach ($sumberdana as $sd) : ?>
                      <option value="<?= $sd['id_sumberdana']; ?>"><?= $sd['nama_sumberdana']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('anggaran'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tahun">Tahun Anggaran</label>
                  <select class="form-control col-md-2 select2bs4" name="tahun">
                    <option value="0">-</option>
                    <?php
                    for ($i = $thnawal; $i <= $thnskrg; $i++) { ?>
                      <option value="<?= $i; ?>"><?= $i; ?></option>
                    <?php } ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('tahun'); ?></small>
                </div>
                <div class="form-group">
                  <label for="katperdin">Kategori Perdin</label>
                  <select class="form-control col-md-4 select2bs4" name="katperdin">
                    <option value="0">-</option>
                    <?php foreach ($katperdin as $katp) : ?>
                      <option value="<?= $katp['id_kat_perdin']; ?>"><?= $katp['nama_kat_perdin']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('katperdin'); ?></small>
                </div>
                <div class="form-group">
                  <label for="frmdana">Dana</label>
                  <input type="text" class="form-control col-md-5" id="frmdana" name="frmdana" placeholder="Enter Dana">
                  <small class="form-text text-danger"><?= form_error('frmdana'); ?></small>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('dana'); ?>" class="btn btn-default">Cancel</a>
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