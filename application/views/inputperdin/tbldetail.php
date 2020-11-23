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
            <div class="card-body">
              <a href="<?= base_url('inperdin'); ?>" class="btn btn-md btn-default">Kembali</a>
            </div>
            <div class="card-body">
              <h3>Klasifikasi Jabatan : <b><?= $perdin['jabatan']; ?></b></h3>
              <h3>Tahun : <b><?= $perdin['tahun']; ?></b></h3>
              <h3>Tahapan Anggaran : <b><?= $perdin['nama_sumberdana']; ?></b></h3>
              <h3>Kategori Perjalanan : <b><?= $perdin['nama_kat_perdin']; ?></b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="" class="table table-bordered table-hover">
                <thead>
                  <tr class="btn-dark">
                    <th>No SP2D</th>
                    <th>Nama Kegiatan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $perdin['no_sp2d']; ?></td>
                    <td><?= $perdin['nama_kegiatan']; ?></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <table id="" class="table table-bordered table-hover">
                <thead>
                  <tr class="btn-dark">
                    <th colspan="7" class="text-center">Surat Tugas / SPD</th>
                  </tr>
                  <tr class="btn-dark">
                    <th>No SP2D</th>
                    <th>Tujuan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Tanggal Selesai</th>
                    <th>Lama (Hari)</th>
                    <th>No Surat Tugas</th>
                    <th>Nama Personil</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $perdin['no_sp2d']; ?></td>
                    <td><?= $perdin['tujuan']; ?></td>
                    <td><?= date('d-m-Y', strtotime($perdin['tgl_berangkat'])); ?></td>
                    <td><?= date('d-m-Y', strtotime($perdin['tgl_selesai'])); ?></td>
                    <td><?= $perdin['lama']; ?></td>
                    <td><?= $perdin['no_surat_tgs']; ?></td>
                    <td><?= $perdin['nama_personil']; ?></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <table id="" class="table table-bordered table-hover">
                <thead>
                  <tr class="btn-dark">
                    <th colspan="12" class="text-center">Dokumen Pertanggungjawaban</th>
                  </tr>
                  <tr class="btn-dark">
                    <th>No SP2D</th>
                    <th>Maskapai</th>
                    <th>Rute</th>
                    <th>Tanggal</th>
                    <th>No Tiket</th>
                    <th>Harga (Rp)</th>
                    <th>Uang Harian</th>
                    <th>Uang Transport</th>
                    <th>Penginapan</th>
                    <th>Uang Representasi</th>
                    <th>Lain - Lain</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $perdin['no_sp2d']; ?></td>
                    <td><?php if ($perdin['nama_maskapai']) {
                          echo $perdin['nama_maskapai'];
                        } else {
                          echo '-';
                        }
                        ?></td>
                    <td><?php if ($perdin['rute']) {
                          echo $perdin['rute'];
                        } else {
                          echo '-';
                        }
                        ?></td>
                    <td><?= date('d-m-Y', strtotime($perdin['tnggal'])); ?></td>
                    <td><?php if ($perdin['no_tiket']) {
                          echo $perdin['no_tiket'];
                        } else {
                          echo '-';
                        }
                        ?></td>
                    <td><?= "Rp " . number_format($perdin['harga'], 0, ',', '.'); ?></td>
                    <td><?= "Rp " . number_format($perdin['uang_harian'], 0, ',', '.'); ?></td>
                    <td><?= "Rp " . number_format($perdin['uang_transport'], 0, ',', '.'); ?></td>
                    <td><?= "Rp " . number_format($perdin['penginapan'], 0, ',', '.'); ?></td>
                    <td><?= "Rp " . number_format($perdin['uang_representatif'], 0, ',', '.'); ?></td>
                    <td><?= "Rp " . number_format($perdin['lain_lain'], 0, ',', '.'); ?></td>
                    <td><?= "Rp " . number_format($perdin['harga'] + $perdin['uang_harian'] + $perdin['uang_transport'] + $perdin['penginapan'] + $perdin['uang_representatif'] + $perdin['lain_lain'], 0, ',', '.'); ?></td>
                  </tr>
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