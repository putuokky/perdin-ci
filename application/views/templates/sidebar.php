<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menu.id,menu,urutan_user_menu 
                  FROM user_menu
                  JOIN user_access_menu ON user_access_menu.menu_id = user_menu.id
                  WHERE user_access_menu.role_id = $role_id
                  AND user_menu.is_active_menu = 1
                  ORDER BY user_menu.urutan_user_menu ASC
                  ";
    $sidebarMenu = $this->db->query($queryMenu)->result_array();
    ?>
    <?php foreach ($sidebarMenu as $sbMenu) : ?>
      <li class="nav-header text-uppercase">
        <?= $sbMenu['menu']; ?>
      </li>

      <?php
      $menuId = $sbMenu['id'];
      $querySubMenu = "SELECT * FROM user_sub_menu 
                        JOIN user_menu ON user_sub_menu.menu_id = user_menu.id
                        WHERE user_sub_menu.menu_id = $menuId
                        AND user_sub_menu.is_active = 1
                        ORDER BY user_sub_menu.urutan_user_sub_menu ASC
                      ";
      $sidebarSubMenu = $this->db->query($querySubMenu)->result_array();
      ?>
      <?php foreach ($sidebarSubMenu as $sbsm) : ?>
        <li class="nav-item">
          <?php if ($judul == $sbsm['submenu']) : ?>
            <a href="<?= base_url($sbsm['url']); ?>" class="nav-link active">
            <?php else : ?>
              <a href="<?= base_url($sbsm['url']); ?>" class="nav-link">
              <?php endif; ?>
              <i class="<?= $sbsm['icon']; ?>"></i>
              <p><?= $sbsm['submenu']; ?></p>
              </a>
        </li>
      <?php endforeach ?>
    <?php endforeach ?>
    <li class="nav-header"></li>
    <li class="nav-item has-treeview">
      <a href="<?= base_url('login/logout'); ?>" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>