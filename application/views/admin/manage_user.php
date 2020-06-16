<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $title ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Utility</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"><?= $title ?></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><?= $title ?></h4>
                                <a href="<?= base_url('admin/tambah_user') ?>" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Tambah User
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>No. HP</th>
                                            <th>Hak Akses</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($daftarKaryawan as $dk) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $dk['nama']; ?></td>
                                                <td><?= $dk['username']; ?></td>
                                                <td><?= $dk['no_hp']; ?></td>
                                                <td><?= $dk['role']; ?></td>
                                                <td style="color: <?= $dk['warna']; ?>"><?= $dk['keterangan']; ?></td>
                                                <td align="center"><a href="<?= base_url('admin/beforeDetail'); ?>/<?= $dk['id']; ?>" class="btn btn-info btn-circle btn-sm">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/hapus_karyawan'); ?>/<?= $dk['id']; ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('User akan dihapus?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php $no += 1;
                                        endforeach; ?>
                                    </tbody>
                                </table>
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
                <?= date('Y') ?>, Apotek Griya Cinere <i class="fa fa-heart heart text-danger"></i>
            </div>
        </div>
    </footer>
</div>