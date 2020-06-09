    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">SERVER</h1><br>

    </div>

    <!-- mulai dari sini -->

    <div class="row ml-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php foreach ($kategori as $kat) : ?>
                <li class="nav-item">
                    <a class="nav-link" id="<?= $kat['id']; ?>" data-toggle="pill" href="#pills-<?= $kat['id']; ?>" role="tab" aria-controls="pills-<?= $kat['id']; ?>" aria-selected="true"><?= $kat['nama_kategori'] ?></a>
                </li>
            <?php endforeach; ?>

        </ul>

    </div>

    <div class="tab-content ml-3" id="pills-tabContent">
        <?php foreach ($kategori as $kat) :  ?>

            <?php $allMenu2 = $this->db->get_where('menu', ['id_kategori' => $kat['id']])->result_array(); ?>
            <div class="tab-pane fade show active" id="pills-<?= $kat['id']; ?>" role="tabpanel" aria-labelledby="<?= $kat['id']; ?>">

                <?php foreach ($allMenu2 as $menu) : ?>
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets'); ?>/img_menu/<?= $menu['foto']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $menu['nama_menu']; ?></h5>
                            <p class="card-text"><?= $menu['deskripsi']; ?></p>
                            <p class="card-text"><?= $menu['harga']; ?></p>
                            <table class="table table-boorderless">

                                <form method="post">
                                    <th><input type="hidden" name="id_b" id="id_b" value="<?= $menu['id']; ?>"></th>
                                    <th><input class="form-control" type="number" name="qty" id="qty" placeholder="Jumlah"></th>

                                    <th><button type="submit" name="btn_qty" id="btn_qty" class="btn btn-primary">Pilih</button></th>
                                </form>
                            </table>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>



    </div>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->