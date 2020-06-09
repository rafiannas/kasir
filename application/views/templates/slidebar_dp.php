<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-shopping-cart"></i>

    </div>
    <div class="sidebar-brand-text mx-3">Maem</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('dapur/home');   ?>">
      <i class="fas fa-fw fa-home"></i>

      <span>Home</span></a>
  </li>


  <hr class="sidebar-divider">


  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('dapur/logout');   ?>">
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