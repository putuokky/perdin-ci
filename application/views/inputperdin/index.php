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
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
              <?php if ($this->session->flashdata('message')) : ?>
                <!-- <div class="alert alert-success alert-dismissible">
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?= $subjudul; ?> Sukses <?= $this->session->flashdata('message'); ?>.
                </div> -->
              <?php endif; ?>
              <a href="<?= base_url('inperdin/tambah'); ?>" class="btn btn-md btn-primary">Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr class="btn-dark">
                    <th>No</th>
                    <th>No SP2D</th>
                    <th>Nama Kegiatan</th>
                    <th>Tujuan</th>
                    <th>Tgl Berangkat</th>
                    <th>Tgl Selesai</th>
                    <th>Lama (Hari)</th>
                    <th>No Surat Tugas</th>
                    <th>Nama Personil</th>
                    <th>Uang Harian</th>
                    <th>Penginapan</th>
                    <th>Uang Representasi</th>
                    <th>Lain - Lain</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="btn-dark">
                    <th>No</th>
                    <th>No SP2D</th>
                    <th>Nama Kegiatan</th>
                    <th>Tujuan</th>
                    <th>Tgl Berangkat</th>
                    <th>Tgl Selesai</th>
                    <th>Lama (Hari)</th>
                    <th>No Surat Tugas</th>
                    <th>Nama Personil</th>
                    <th>Uang Harian</th>
                    <th>Penginapan</th>
                    <th>Uang Representasi</th>
                    <th>Lain - Lain</th>
                    <th>Jumlah</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($iptperdin as $itpd) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><a href="<?= base_url('inperdin/ubah/' . $itpd['id_perdin']); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="<?= base_url('inperdin/hapus/' . $itpd['id_perdin']); ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
                      <td><?= $itpd['nama_kegiatan']; ?></td>
                      <td><?= $itpd['tujuan']; ?></td>
                      <td><?= date('d-m-Y', strtotime($itpd['tgl_berangkat'])); ?></td>
                      <td><?= date('d-m-Y', strtotime($itpd['tgl_selesai'])); ?></td>
                      <td><?= $itpd['lama']; ?></td>
                      <td><?= $itpd['no_surat_tgs']; ?></td>
                      <td><?= $itpd['nama_personil']; ?></td>
                      <td><?= "Rp " . number_format($itpd['uang_harian'], 2, ',', '.'); ?></td>
                      <td><?= "Rp " . number_format($itpd['penginapan'], 2, ',', '.'); ?></td>
                      <td><?= "Rp " . number_format($itpd['uang_representatif'], 2, ',', '.'); ?></td>
                      <td><?= "Rp " . number_format($itpd['lain_lain'], 2, ',', '.'); ?></td>
                      <td><?= "Rp " . number_format(($itpd['harga'] + $itpd['uang_harian'] + $itpd['uang_transport'] + $itpd['penginapan'] + $itpd['uang_representatif'] + $itpd['lain_lain']), 2, ',', '.'); ?></td>
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