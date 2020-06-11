<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-shopping-cart"></i>

    </div>
    <div class="sidebar-brand-text mx-3">Slengseng</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Query Menu -->
  <?php
  //Join
  $role_id = $this->session->userdata('role_id');
  $query_menu = "SELECT `karyawan_menu`.`id`, `menu`
                    FROM `karyawan_menu` JOIN `karyawan_access_menu`
                    ON `karyawan_menu`.`id` = `karyawan_access_menu`.`menu_id`
                    WHERE `karyawan_access_menu`.`role_id`= $role_id
                    ORDER BY `karyawan_access_menu`.`menu_id` ASC
                    ";
  //nagambil semua yg ada di db
  $menu = $this->db->query($query_menu)->result_array();



  ?>



  <!-- Looping Menu -->
  <?php
  foreach ($menu as $m) : ?>

    <div class="sidebar-heading">
      <?= $m["menu"]; ?>
    </div>

    <!-- Siapkan Sub Menu sesuai menu -->
    <?php
    $m_id = $m['id'];
    $query_sub_menu = "SELECT *
                      FROM `karyawan_sub_menu` 
                      JOIN `karyawan_menu` ON `karyawan_sub_menu`.`menu_id` = `karyawan_menu`.`id`
                      WHERE `karyawan_sub_menu`.`menu_id` = $m_id
                      AND `karyawan_sub_menu`.`is_active`= 1
                      ";


    $sub_menu = $this->db->query($query_sub_menu)->result_array();

    ?>


    <?php foreach ($sub_menu as $sub) : ?>
      <!-- Nav Item - Dashboard -->
      <?php if ($sub_menu == $sub['title']) : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url($sub['url']); ?>">
          <i class="<?= $sub['icon']; ?>"></i>
          <span><?= $sub['title']; ?></span></a>
        </li>




      <?php endforeach; ?>
      <!-- Divider -->
      <hr class="sidebar-divider mt-3">

    <?php endforeach; ?>






    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout');   ?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>

        <span>Keluar</span></a>
    </li>

    <!-- Divider //untuk garis -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->