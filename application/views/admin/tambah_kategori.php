    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1><br>
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
                        <h6 class="m-0 font-weight-bold text-info">Tambah Kategori</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('admin/tambah_kategori'); ?>">
                            <div class="form-group">
                                <label for="nama" class="m-0 font-weight-bold text-primary">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required autofocus>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?= base_url('admin/daftar_menu'); ?>" class="btn btn-google btn-block">Batal</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-facebook btn-block">Oke</button>
                                </div>
                            </div>
                        </form>
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