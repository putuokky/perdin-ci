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
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $submenu['id_user_sub_menu']; ?>">
                <div class="form-group">
                  <label for="menu">Menu</label>
                  <select class="form-control col-md-4 select2bs4" name="menu">
                    <option value="0">-</option>
                    <?php foreach ($menu as $m) : ?>
                      <?php if ($submenu['menu_id'] == $m['id']) : ?>
                        <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                      <?php else : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                </div>
                <div class="form-group">
                  <label for="menu">SubMenu</label>
                  <input type="text" class="form-control" id="submenu" name="submenu" placeholder="Enter SubMenu" value="<?= $submenu['submenu']; ?>">
                  <small class="form-text text-danger"><?= form_error('submenu'); ?></small>
                </div>
                <div class="form-group">
                  <label for="url">URL</label>
                  <input type="text" class="form-control col-md-4" id="url" name="url" placeholder="Enter URL" value="<?= $submenu['url']; ?>">
                  <small class="form-text text-danger"><?= form_error('url'); ?></small>
                </div>
                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control col-md-6" id="icon" name="icon" placeholder="Enter Icon" value="<?= $submenu['icon']; ?>">
                  <small class="form-text text-danger"><?= form_error('icon'); ?></small>
                </div>
                <div class="form-group">
                  <label for="urutan">Urutan</label>
                  <input type="text" class="form-control col-md-2" id="urutan" name="urutan" placeholder="Enter Urutan" value="<?= $submenu['urutan_user_sub_menu']; ?>">
                  <small class="form-text text-danger"><?= form_error('urutan'); ?></small>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Status</label>
                  <div class="input-group">
                    <div class="form-check">
                      <?php
                      if ($submenu['is_active'] == 1) { ?>
                        <input type="checkbox" class="form-check-input" value="1" id="status" name="status" checked>
                        <label class="form-check-label" for="status">Aktif</label>
                      <?php } else if ($submenu['is_active'] == 0) { ?>
                        <input type="checkbox" class="form-check-input" value="1" id="status" name="status">
                        <label class="form-check-label" for="status">Aktif</label>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('submenu'); ?>" class="btn btn-default">Cancel</a>
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