    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Menu</h1><br>

        </div>
        <div class="container-fluid">
            <a class="btn btn-primary mb-3 ml-1" href="<?= base_url('admin/tambah_kategori'); ?>">Tambah kategori</a>
            <a class="btn btn-info mb-3 ml-1" href="<?= base_url('admin/tambah_per_kategori'); ?>">Tambah menu per kategori</a>
            <?= $this->session->flashdata('message');  ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="color: blue">No.</th>
                                    <th style="color: blue">Nama Kategori</th>
                                    <th style="color: blue">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($kategori as $dk) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $dk['nama_kategori']; ?></td>

                                        <td><a href="<?= base_url('admin/before_per_kategori'); ?>/<?= $dk['id']; ?>" class="btn btn-primary btn-circle btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('admin/beforeEdit'); ?>/<?= $dk['id']; ?>" class="btn btn-warning btn-circle btn-sm ml-3">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?= base_url('admin/hapus_kategori'); ?>/<?= $dk['id']; ?>" class="btn btn-danger btn-circle btn-sm ml-3" onclick="return confirm('Yakin Mau Hapus?');">
                                                <i class="fas fa-trash"></i>
                                            </a></td>

                                    </tr>
                                <?php $i += 1;
                                endforeach; ?>

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