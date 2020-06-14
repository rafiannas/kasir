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

<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url('assets/');  ?>/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= $saya_karyawan['nama']; ?>
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <!-- Looping Menu -->
                <?php
                foreach ($menu as $m) : ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section"> <?= $m["menu"]; ?> </h4>
                    </li>
                    <!-- Siapkan Sub Menu sesuai menu -->
                    <?php
                    $m_id = $m['id'];
                    $query_sub_menu = "SELECT *
                      FROM `karyawan_sub_menu` JOIN `karyawan_menu`
                      ON `karyawan_sub_menu`.`menu_id` = `karyawan_menu`.`id`
                      WHERE `karyawan_sub_menu`.`menu_id` = $m_id
                      AND `karyawan_sub_menu`.`is_active`= 1
                      ";
                    $sub_menu = $this->db->query($query_sub_menu)->result_array();
                    ?>
                    <?php foreach ($sub_menu as $sub) : ?>
                        <!-- Nav Item - Dashboard -->
                        <?php if ($title == $sub['title']) : ?>
                            <li class="nav-item active">
                            <?php else : ?>
                            <li class="nav-item">
                            <?php endif; ?>
                            <a href="<?= base_url($sub['url']); ?>">
                                <i class="<?= $sub['icon']; ?>"></i>
                                <p><?= $sub['title']; ?></p>
                            </a>
                            </li>
                        <?php endforeach; ?>
                        <!-- Divider -->
                    <?php endforeach; ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Keluar</h4>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('auth/logout'); ?>">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Keluar</p>
                        </a>
                    </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->