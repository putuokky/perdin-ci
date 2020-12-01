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
                  <label for="sumberdana">Sumberdana</label>
                  <select class="form-control col-md-12 select2bs4" name="sumberdana">
                    <option value="0">-</option>
                    <?php foreach ($sumberdana as $sbdn) : ?>
                      <option value="<?= $sbdn['id_dana']; ?>"><?= $sbdn['jabatan'] . " | " . $sbdn['nama_sumberdana'] . " | " . $sbdn['tahun_anggaran'] . " | " . $sbdn['nama_kat_perdin']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('sumberdana'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nospd">No SP2D</label>
                  <input type="text" class="form-control col-md-4" id="nospd" name="nospd" placeholder="Enter No SP2D">
                  <small class="form-text text-danger"><?= form_error('nospd'); ?></small>
                </div>
                <div class="form-group">
                  <label for="namaacara">Nama Kegiatan</label>
                  <input type="text" class="form-control col-md-12" id="namaacara" name="namaacara" placeholder="Enter Nama Kegiatan">
                  <small class="form-text text-danger"><?= form_error('namaacara'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tujuan">Tujuan</label>
                  <input type="text" class="form-control col-md-4" id="tujuan" name="tujuan" placeholder="Enter Tujuan">
                  <small class="form-text text-danger"><?= form_error('tujuan'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tglbrngkat">Tanggal Berangkat</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control col-md-3" id="datepickerbrkt" name="tglbrngkat" placeholder="Enter Tanggal Berangkat">
                  </div>
                  <small class="form-text text-danger"><?= form_error('tglbrngkat'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tglselesai">Tanggal Selesai</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control col-md-3" id="datepickerselesai" name="tglselesai" placeholder="Enter Tanggal Selesai">
                  </div>
                  <small class="form-text text-danger"><?= form_error('tglselesai'); ?></small>
                </div>
                <div class="form-group">
                  <label for="lama">Lama (Hari)</label>
                  <input type="text" class="form-control col-md-2" id="lama" name="lama" placeholder="Enter Lama (Hari)">
                  <small class="form-text text-danger"><?= form_error('lama'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nosrttgs">No Surat Tugas</label>
                  <input type="text" class="form-control col-md-4" id="nosrttgs" name="nosrttgs" placeholder="Enter No Surat Tugas">
                  <small class="form-text text-danger"><?= form_error('nosrttgs'); ?></small>
                </div>
                <div class="form-group">
                  <label for="namapersonil">Nama Personil</label>
                  <input type="text" class="form-control col-md-6" id="namapersonil" name="namapersonil" placeholder="Enter Nama Personil">
                  <small class="form-text text-danger"><?= form_error('namapersonil'); ?></small>
                </div>
                <div class="form-group">
                  <label for="maskap">Maskapai</label>
                  <select class="form-control col-md-3 select2bs4" name="maskap">
                    <option value="0">-</option>
                    <?php foreach ($maskp as $m) : ?>
                      <option value="<?= $m['id_maskapai']; ?>"><?= $m['nama_maskapai']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('maskap'); ?></small>
                </div>
                <div class="form-group">
                  <label for="rute">Rute</label>
                  <input type="text" class="form-control col-md-6" id="rute" name="rute" placeholder="Enter Rute">
                  <small class="form-text text-danger"><?= form_error('rute'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tgl">Tanggal</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control col-md-3" id="datepicker" name="tgl" placeholder="Enter Tanggal">
                  </div>
                  <small class="form-text text-danger"><?= form_error('tgl'); ?></small>
                </div>
                <div class="form-group">
                  <label for="notiket">No Tiket</label>
                  <input type="text" class="form-control col-md-6" id="notiket" name="notiket" placeholder="Enter No Tiket">
                  <small class="form-text text-danger"><?= form_error('notiket'); ?></small>
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control col-md-3" id="harga" name="harga" placeholder="Enter Harga">
                  <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                </div>
                <div class="form-group">
                  <label for="uangharian">Uang Harian</label>
                  <input type="text" class="form-control col-md-3" id="uangharian" name="uangharian" placeholder="Enter Uang Harian">
                  <small class="form-text text-danger"><?= form_error('uangharian'); ?></small>
                </div>
                <div class="form-group">
                  <label for="uangtransport">Uang Transport</label>
                  <input type="text" class="form-control col-md-3" id="uangtransport" name="uangtransport" placeholder="Enter Uang Transport">
                  <small class="form-text text-danger"><?= form_error('uangtransport'); ?></small>
                </div>
                <div class="form-group">
                  <label for="penginapan">Penginapan</label>
                  <input type="text" class="form-control col-md-3" id="penginapan" name="penginapan" placeholder="Enter Penginapan">
                  <small class="form-text text-danger"><?= form_error('penginapan'); ?></small>
                </div>
                <div class="form-group">
                  <label for="uangrepre">Uang Representatif</label>
                  <input type="text" class="form-control col-md-3" id="uangrepre" name="uangrepre" placeholder="Enter Uang Representatif">
                  <small class="form-text text-danger"><?= form_error('uangrepre'); ?></small>
                </div>
                <div class="form-group">
                  <label for="lainlain">Lain - Lain</label>
                  <input type="text" class="form-control col-md-3" id="lainlain" name="lainlain" placeholder="Enter Lain - Lain">
                  <small class="form-text text-danger"><?= form_error('lainlain'); ?></small>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('inperdin'); ?>" class="btn btn-default">Cancel</a>
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