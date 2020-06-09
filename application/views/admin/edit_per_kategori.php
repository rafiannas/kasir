    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Edit</h1><br>

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
                        <h6 class="m-0 font-weight-bold text-info"><?= $perKategori['nama_menu']; ?></h6>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('admin/edit_per_kategori'); ?>
                        <div class="form-group">
                            <label for="nama" class="m-0 font-weight-bold text-primary">Nama Menu</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $perKategori['nama_menu']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="m-0 font-weight-bold text-primary">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="No HP" value="<?= $perKategori['deskripsi']; ?>" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="kategori" class="m-0 font-weight-bold text-primary">Kategori</label>
                                <select id="kategori" name="kategori" class="form-control">
                                    <!-- <option selected>Choose...</option> -->
                                    <?php foreach ($kategori as $st) : ?>
                                        <?php if ($st['id'] == $perKategori['id_kategori']) : ?>
                                            <option value="<?= $st['id']; ?>" selected><?= $st['nama_kategori']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $st['id']; ?>"><?= $st['nama_kategori']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="harga" class="m-0 font-weight-bold text-primary">Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?= $perKategori['harga']; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label for="kategori" class="m-0 font-weight-bold text-primary">Foto</label>
                                <div class="col-sm-6">
                                    <img src="<?= base_url('assets/img_menu/') . $perKategori['foto']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-3">
                                    <!-- form ubah foto  -->

                                    <input type="file" class="btn btn-outline-secondary" name="image">

                                </div>
                                <span class="ml-3"><b>Maksimal ukuran file 2 Mb</b></span>
                            </div>
                        </div>



                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= base_url('admin/per_kategori'); ?>" class="btn btn-google btn-block">Batal</a>

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