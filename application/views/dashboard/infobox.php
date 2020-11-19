<!-- Default box -->
<div class="row">
  <!-- /.col -->
  <?php
  $sqlsabuk = $this->db->get('sabuk')->result_array();

  foreach ($sqlsabuk as $sqlsbk) : ?>
    <div class="col-md-3 col-sm-4">
      <div class="info-box mb-3">
        <span class="info-box-icon elevation-1" style="background-color: <?= $sqlsbk['warna_sabuk']; ?>; color: <?= $sqlsbk['warna_tulisan']; ?>;"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Sabuk <?= $sqlsbk['nama_sabuk'] . " (" . $sqlsbk['tingkatan_sabuk'] . ")"; ?></span>
          <?php
          $idsabuk = $sqlsbk['id_sabuk'];
          $queryjmlhsabuk = "SELECT COUNT(*) as jml FROM karateka WHERE sabuk = $idsabuk && is_active = 1";
          $sqljmlhsabuk = $this->db->query($queryjmlhsabuk)->result_array();

          foreach ($sqljmlhsabuk as $sqljmsbk) : ?>
            <span class="info-box-number"><?= $sqljmsbk['jml']; ?></span>
          <?php endforeach; ?>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  <?php endforeach; ?>
  <!-- /.col -->
</div>