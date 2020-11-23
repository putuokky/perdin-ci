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
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $perdin['id_perdin']; ?>">
                <div class="form-group">
                  <label for="klasijbtn">Klasifikasi Jabatan</label>
                  <select class="form-control col-md-6 select2bs4" name="klasijbtn">
                    <option value="0">-</option>
                    <?php foreach ($klasijbtn as $kljb) : ?>
                      <?php if ($perdin['klasifikasi_jabtan'] == $kljb['kode_kj']) : ?>
                        <option value="<?= $kljb['kode_kj']; ?>" selected><?= $kljb['jabatan']; ?></option>
                      <?php else : ?>
                        <option value="<?= $kljb['kode_kj']; ?>"><?= $kljb['jabatan']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('klasijbtn'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tahunangran">Tahun Anggaran</label>
                  <select class="form-control col-md-2 select2bs4" name="tahunangran">
                    <option value="0">-</option>
                    <?php
                    for ($i = $thnawal; $i <= $thnskrg; $i++) { ?>
                      <?php if ($i == $perdin['tahun']) : ?>
                        <option value="<?= $i; ?>" selected><?= $i; ?></option>
                      <?php else : ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                      <?php endif; ?>
                    <?php } ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('tahunangran'); ?></small>
                </div>
                <div class="form-group">
                  <label for="anggaran">Tahapaan Anggaran</label>
                  <select class="form-control col-md-2 select2bs4" name="anggaran">
                    <option value="0">-</option>
                    <?php foreach ($sumberdana as $sd) : ?>
                      <?php if ($perdin['tahapan_anggaran'] == $sd['id_sumberdana']) : ?>
                        <option value="<?= $sd['id_sumberdana']; ?>" selected><?= $sd['nama_sumberdana']; ?></option>
                      <?php else : ?>
                        <option value="<?= $sd['id_sumberdana']; ?>"><?= $sd['nama_sumberdana']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('anggaran'); ?></small>
                </div>
                <div class="form-group">
                  <label for="katperdin">Kategori Perdin</label>
                  <select class="form-control col-md-4 select2bs4" name="katperdin">
                    <option value="0">-</option>
                    <?php foreach ($katperdin as $katp) : ?>
                      <?php if ($perdin['kategori_perjalanan'] == $katp['id_kat_perdin']) : ?>
                        <option value="<?= $katp['id_kat_perdin']; ?>" selected><?= $katp['nama_kat_perdin']; ?></option>
                      <?php else : ?>
                        <option value="<?= $katp['id_kat_perdin']; ?>"><?= $katp['nama_kat_perdin']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('katperdin'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nospd">No SP2D</label>
                  <input type="text" class="form-control col-md-4" id="nospd" name="nospd" placeholder="Enter No SP2D" value="<?= $perdin['no_sp2d']; ?>">
                  <small class="form-text text-danger"><?= form_error('nospd'); ?></small>
                </div>
                <div class="form-group">
                  <label for="namaacara">Nama Kegiatan</label>
                  <input type="text" class="form-control col-md-12" id="namaacara" name="namaacara" placeholder="Enter Nama Kegiatan" value="<?= $perdin['nama_kegiatan']; ?>">
                  <small class="form-text text-danger"><?= form_error('namaacara'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tujuan">Tujuan</label>
                  <input type="text" class="form-control col-md-4" id="tujuan" name="tujuan" placeholder="Enter Tujuan" value="<?= $perdin['tujuan']; ?>">
                  <small class="form-text text-danger"><?= form_error('tujuan'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tglbrngkat">Tanggal Berangkat</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control col-md-3" id="datepickerbrkt" name="tglbrngkat" placeholder="Enter Tanggal Berangkat" value="<?= date('d-m-Y', strtotime($perdin['tgl_berangkat'])); ?>">
                  </div>
                  <small class="form-text text-danger"><?= form_error('tglbrngkat'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tglselesai">Tanggal Selesai</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control col-md-3" id="datepickerselesai" name="tglselesai" placeholder="Enter Tanggal Selesai" value="<?= date('d-m-Y', strtotime($perdin['tgl_selesai'])); ?>">
                  </div>
                  <small class="form-text text-danger"><?= form_error('tglselesai'); ?></small>
                </div>
                <div class="form-group">
                  <label for="lama">Lama (Hari)</label>
                  <input type="text" class="form-control col-md-2" id="lama" name="lama" placeholder="Enter Lama (Hari)" value="<?= $perdin['lama']; ?>">
                  <small class="form-text text-danger"><?= form_error('lama'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nosrttgs">No Surat Tugas</label>
                  <input type="text" class="form-control col-md-4" id="nosrttgs" name="nosrttgs" placeholder="Enter No Surat Tugas" value="<?= $perdin['no_surat_tgs']; ?>">
                  <small class="form-text text-danger"><?= form_error('nosrttgs'); ?></small>
                </div>
                <div class="form-group">
                  <label for="namapersonil">Nama Personil</label>
                  <input type="text" class="form-control col-md-6" id="namapersonil" name="namapersonil" placeholder="Enter Nama Personil" value="<?= $perdin['nama_personil']; ?>">
                  <small class="form-text text-danger"><?= form_error('namapersonil'); ?></small>
                </div>
                <div class="form-group">
                  <label for="maskap">Maskapai</label>
                  <select class="form-control col-md-3 select2bs4" name="maskap">
                    <option value="0">-</option>
                    <?php foreach ($maskp as $m) : ?>
                      <?php if ($perdin['maskapai'] == $m['id_maskapai']) : ?>
                        <option value="<?= $m['id_maskapai']; ?>" selected><?= $m['nama_maskapai']; ?></option>
                      <?php else : ?>
                        <option value="<?= $m['id_maskapai']; ?>"><?= $m['nama_maskapai']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('maskap'); ?></small>
                </div>
                <div class="form-group">
                  <label for="rute">Rute</label>
                  <input type="text" class="form-control col-md-6" id="rute" name="rute" placeholder="Enter Rute" value="<?= $perdin['rute']; ?>">
                  <small class="form-text text-danger"><?= form_error('rute'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tgl">Tanggal</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control col-md-3" id="datepicker" name="tgl" placeholder="Enter Tanggal" value="<?= date('d-m-Y', strtotime($perdin['tnggal'])); ?>">
                  </div>
                  <small class="form-text text-danger"><?= form_error('tgl'); ?></small>
                </div>
                <div class="form-group">
                  <label for="notiket">No Tiket</label>
                  <input type="text" class="form-control col-md-6" id="notiket" name="notiket" placeholder="Enter No Tiket" value="<?= $perdin['no_tiket']; ?>">
                  <small class="form-text text-danger"><?= form_error('notiket'); ?></small>
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control col-md-3" id="harga" name="harga" placeholder="Enter Harga" value="<?= $perdin['harga']; ?>">
                  <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                </div>
                <div class="form-group">
                  <label for="uangharian">Uang Harian</label>
                  <input type="text" class="form-control col-md-3" id="uangharian" name="uangharian" placeholder="Enter Uang Harian" value="<?= $perdin['uang_harian']; ?>">
                  <small class="form-text text-danger"><?= form_error('uangharian'); ?></small>
                </div>
                <div class="form-group">
                  <label for="uangtransport">Uang Transport</label>
                  <input type="text" class="form-control col-md-3" id="uangtransport" name="uangtransport" placeholder="Enter Uang Transport" value="<?= $perdin['uang_transport']; ?>">
                  <small class="form-text text-danger"><?= form_error('uangtransport'); ?></small>
                </div>
                <div class="form-group">
                  <label for="penginapan">Penginapan</label>
                  <input type="text" class="form-control col-md-3" id="penginapan" name="penginapan" placeholder="Enter Penginapan" value="<?= $perdin['penginapan']; ?>">
                  <small class="form-text text-danger"><?= form_error('penginapan'); ?></small>
                </div>
                <div class="form-group">
                  <label for="uangrepre">Uang Representatif</label>
                  <input type="text" class="form-control col-md-3" id="uangrepre" name="uangrepre" placeholder="Enter Uang Representatif" value="<?= $perdin['uang_representatif']; ?>">
                  <small class="form-text text-danger"><?= form_error('uangrepre'); ?></small>
                </div>
                <div class="form-group">
                  <label for="lainlain">Lain - Lain</label>
                  <input type="text" class="form-control col-md-3" id="lainlain" name="lainlain" placeholder="Enter Lain - Lain" value="<?= $perdin['lain_lain']; ?>">
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