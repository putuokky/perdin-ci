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
              <h3 class="card-title"><?= $filjudul; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <form role="form" method="POST" action="<?= base_url('laporperdin'); ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                    <select class="form-control col-md-2 select2bs4" name="tahun">
                      <!-- <option value="0">-</option> -->
                      <?php
                      for ($i = $thnawal; $i <= $thnskrg; $i++) { ?>
                      <?php if ($i) : ?>
                        <option value="<?= $i; ?>" selected><?= $i; ?></option>
                      <?php else : ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                      <?php endif; ?>
                      <?php } ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('tahun'); ?></small>
                  </div>
                  <div class="form-group row">
                    <label for="thpanggaran" class="col-sm-2 col-form-label">Tahapan Anggaran</label>
                    <select class="form-control col-md-2 select2bs4" name="thpanggaran">
                      <option value="0">-</option>
                      <?php foreach ($sumber as $su) : ?>
                        <option value="<?= $su['id_sumberdana']; ?>"><?= $su['nama_sumberdana']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('thpanggaran'); ?></small>
                  </div>
                  <div class="form-group row">
                    <label for="klsjabatan" class="col-sm-2 col-form-label">Kelas Jabatan</label>
                    <select class="form-control col-md-6 select2bs4" name="klsjabatan">
                      <option value="0">-</option>
                      <?php foreach ($klajbt as $kljb) : ?>
                        <option value="<?= $kljb['kode_kj']; ?>"><?= $kljb['jabatan']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('klsjabatan'); ?></small>
                  </div>
                  <div class="form-group row">
                    <label for="katperdin" class="col-sm-2 col-form-label">Kategori Perdin</label>
                    <select class="form-control col-md-4 select2bs4" name="katperdin">
                      <option value="0">-</option>
                      <?php foreach ($katper as $katp) : ?>
                        <option value="<?= $katp['id_kat_perdin']; ?>"><?= $katp['nama_kat_perdin']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('katperdin'); ?></small>
                  </div>
                </div>
                <button type="submit" class="btn btn-info">Cari</button>
              </form>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->




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
            <div class="card-body">
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
              <?php if ($this->session->flashdata('message')) : ?>
                <!-- <div class="alert alert-success alert-dismissible">
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?= $subjudul; ?> Sukses <?= $this->session->flashdata('message'); ?>.
                </div> -->
              <?php endif; ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr class="btn-dark">
                    <th>No</th>
                    <th>Kelas Jabatan</th>
                    <th>Dana</th>
                    <th>Realisasi</th>
                    <th>Sisa</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="btn-dark">
                    <th>No</th>
                    <th>Kelas Jabatan</th>
                    <th>Dana</th>
                    <th>Realisasi</th>
                    <th>Sisa</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($lapdin as $lp) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $lp['jabatan']; ?></td>
                      <td><?= "Rp " . number_format($lp['debit_perdin'], 0, ',', '.'); ?></td>
                      <td><?= "Rp " . number_format($lp['jumlah'], 0, ',', '.'); ?></td>
                      <td><?= "Rp " . number_format(($lp['debit_perdin'] - $lp['jumlah']), 0, ',', '.'); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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