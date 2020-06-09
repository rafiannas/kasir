    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Karyawan</h1><br>

        </div>
        <div class="container-fluid">
            <a class="btn btn-primary mb-3 ml-1" href="<?= base_url('admin/tambah_karyawan'); ?>">Tambah Karyawan</a>
            <?= $this->session->flashdata('message');  ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Karyawan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="color: blue">Nama</th>
                                    <th style="color: blue">Username</th>
                                    <th style="color: blue">No. HP</th>
                                    <th style="color: blue">Posisi</th>
                                    <th style="color: blue">Status</th>
                                    <th style="color: blue">Detail</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($daftarKaryawan as $dk) : ?>
                                    <tr>
                                        <td><?= $dk['nama']; ?></td>
                                        <td><?= $dk['username']; ?></td>
                                        <td><?= $dk['no_hp']; ?></td>
                                        <td><?= $dk['role']; ?></td>
                                        <td style="color: <?= $dk['warna']; ?>"><?= $dk['keterangan']; ?></td>
                                        <td><a href="<?= base_url('admin/beforeDetail'); ?>/<?= $dk['id']; ?>" class="btn btn-primary btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('admin/hapus_karyawan'); ?>/<?= $dk['id']; ?>" class="btn btn-danger btn-circle btn-sm ml-3" onclick="return confirm('Yakin Mau Hapus?');">
                                                <i class="fas fa-trash"></i>
                                            </a></td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>












    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->