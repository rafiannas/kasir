    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">SERVER</h1><br>

        <h1>Ganti Status Pesanan</h1>
        <h2 class="ml-3"><?= $dipilih['atas_nama']; ?></h2>

    </div>
    <form action="" method="post">
        <input type="hidden" id="id_p" name="id_p" value="<?= $dipilih['id']; ?>">
        <div class="row">
            <div class="col-md-5 ml-3">
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="status2" id="status2">
                        <?php foreach ($pilihan as $p) : ?>
                            <?php if ($p['ket'] == $dipilih['ket']) : ?>
                                <option value="<?= $dipilih['id']; ?>" selected><?= $dipilih['ket']; ?> </option>
                            <?php else : ?>
                                <option value="<?= $p['id']; ?>"><?= $p['ket']; ?> </option>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary ml-3">Oke</button>

            </div>
        </div>
    </form>






    </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->