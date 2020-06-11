<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $title ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?= base_url('superadmin/index') ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Kelola Mitra</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('superadmin/list_toko') ?>">Daftar Toko</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"><strong>Info Toko</strong></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <?= $this->session->flashdata('message');  ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit User</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="pills-without-border-tabContent">
                                <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                    <form method="post" action="<?= base_url('admin/detail_user'); ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Nama User</label>
                                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" value="<?= $detail['nama']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Nomor Handphone</label>
                                                    <input type="text" class="form-control" name="no_hp" placeholder="Masukkan nomor handphone" value="<?= $detail['no_hp']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Username</label>
                                                    <input type="text" class="form-control" name="no_hp" placeholder="Masukkan username" value="<?= $detail['username']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Password Baru</label>
                                                    <input type="text" class="form-control" name="no_hp" placeholder="Kosongkan password jika tidak diubah" value="<?= $detail['username']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Hak Akses</label>
                                                    <input type="text" class="form-control" name="no_hp" placeholder="Masukkan username" value="<?= $detail['username']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label class="mb-2">Status</label>
                                                    <input type="text" class="form-control" name="no_hp" placeholder="Kosongkan password jika tidak diubah" value="<?= $detail['username']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-header" style="background-image: url('<?= base_url('assets') ?>/assets/img/blogpost.jpg')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="<?= base_url('assets/assets/img/profile.jpg') ?>" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <!-- <div class="name"> <?= $infotoko['nama_toko']; ?></div>
                                    <div class="job"> <?= $infotoko['deskripsi_toko']; ?></div>
                                    <div class="job"> <?= $infotoko['email']; ?></div>
                                    <div class="desc">Bergabung : <?= date('d F Y', $infotoko['date_create']); ?></div> -->
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row user-stats text-center">
                                <div class="col">
                                    <div class="number">
                                        <!-- <?php $i = 0;
                                                foreach ($produk as $p) : ?>
                                                <?php $i++; ?>
                                            <?php endforeach;
                                                $semuaproduk = $i;
                                                echo $semuaproduk; ?> -->
                                    </div>
                                    <div class="title">Produk</div>
                                </div>
                                <div class="col">
                                    <!-- <div class="number"><?= $order['jmh']; ?></div> -->
                                    <div class="title">Terjual</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright ml-auto">
                <?= date('Y') ?>, Develope with <i class="fa fa-heart heart text-danger"></i> by <a href="https://informatika.uai.ac.id/">IF UAI</a>
            </div>
        </div>
    </footer>
</div>


<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Detail Karyawan</h1><br>

</div>

<!-- mulai dari sini -->
<div class="container-fluid">
    <?= $this->session->flashdata('message');  ?>
    <!-- Page Heading -->


    <div class="row">

        <div class="col-lg-6">



            <!-- Brand Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info"><?= $detail['nama']; ?></h6>
                </div>
                <div class="card-body">

                </div>
            </div>

        </div>



    </div>

</div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->