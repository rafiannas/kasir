    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Daftar Menu</h1><br>
        <?= $this->session->flashdata('message');  ?>
    </div>
    <!-- mulai dari sini -->

    <div class="row ml-3">
        <ul class="nav nav-pills mb-3">
            <?php foreach ($kategori as $kat) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('gudang/temp') ?>/<?= $kat['id']; ?>" aria-selected="true"><?= $kat['nama_kategori'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="row ml-3 mr-3">
        <div class="column">
            <!-- <h3 class="primary" class="ml-1 mb-3"><?= $judulMenu['nama_kategori']; ?></h3> -->
            <div class="row">
                <?php foreach ($byMenu as $i) : ?>
                    <div class="col-3">
                        <div class="card mb-3" style="width: 86;">
                            <img style="width: 220px" ; height="100px" src="<?= base_url('assets'); ?>/img_menu/<?= $i['foto']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><b><?= $i['nama_menu']; ?></b></h5>
                                <p class="card-text"><?= $i['deskripsi']; ?></p>
                                <p>Rp. <?= $i['harga']; ?></p>
                                <table class="table table-boorderless">
                                    <form method="post">
                                        <th><input type="hidden" name="id_b" id="id_b" value="<?= $i['id']; ?>"></th>
                                        <th><input class="form-control" type="number" value="<?= $i['stok']; ?>" readonly></th>

                                        <th><a class="btn btn-primary" href="<?= base_url('gudang/s_ubah_stok'); ?>/<?= $i['id']; ?>">Ubah</a></th>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>


    </div>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->