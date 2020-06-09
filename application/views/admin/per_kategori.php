    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Menu per Kategori</h1><br>

        </div>
        <div class="container-fluid">
            <a class="btn btn-warning mb-3 ml-1" href="<?= base_url('admin/daftar_menu'); ?>">Kembali</a>
            <a class="btn btn-primary mb-3 ml-1" href="<?= base_url('admin/tambah_per_kategori'); ?>">Tambah menu di kategori <?= $kategoriOnly['nama_kategori']; ?></a>
            <?= $this->session->flashdata('message');  ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori <?= $kategoriOnly['nama_kategori']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="color: blue">No.</th>
                                    <th style="color: blue">Nama Menu</th>
                                    <th style="color: blue">Deskripsi</th>
                                    <th style="color: blue">Harga</th>
                                    <th style="color: blue">Foto</th>
                                    <th style="color: blue">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($kategori as $dk) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $dk['nama_menu']; ?></td>
                                        <td><?= $dk['deskripsi']; ?></td>
                                        <td>Rp. <?= number_format($dk['harga']); ?></td>
                                        <td><img style="width:100;height:100px;border:0;" src="<?= base_url('assets/img_menu/') . $dk['foto']; ?>"></td>

                                        <td>
                                            <a href="<?= base_url('admin/before_edit_per_kategori'); ?>/<?= $dk['id']; ?>" class="btn btn-warning btn-circle btn-sm ml-3">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?= base_url('admin/hapus_per_kategori'); ?>/<?= $dk['id']; ?>" class="btn btn-danger btn-circle btn-sm ml-3" onclick="return confirm('Yakin Mau Hapus?');">
                                                <i class="fas fa-trash "></i>
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