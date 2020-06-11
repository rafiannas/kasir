<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-4">
                    <!-- <div class="auto-scroll"> -->
                    <div class="card">
                        <div class="card-body">
                            <label class="mb-2">Supplier</label>
                            <div class="select2-input">
                                <select id="basic" name="supplier" class="form-control" required style="width: 100%;">
                                    <option value="">- Pilih Supplier -</option>
                                    <?php foreach ($supplier as $st) : ?>
                                        <option value="<?= $st['id']; ?>"><?= $st['nama_supplier']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <label class="mb-2">No.Nota</label>
                            <input type="text" class="form-control" name="nota" placeholder="Masukkan nota pembelian" required>

                            <div class="separator-solid"></div>

                            <label class="mb-2">Obat</label>
                            <input type="text" class="form-control" id="obat" name="obat" placeholder="Masukkan nama obat" required>


                            <label class="mb-2 mt-2">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="username-addon">Rp.</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Harga beli" aria-describedby="username-addon" name="hargabeli" id="hargabeli" value="" required disabled>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="mb-2 mt-2">Satuan</label>
                                    <input type="text" class="form-control" name="satuan" id="satuan" disabled required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mb-2 mt-2">Jumlah</label>
                                    <input type="number" min="1" max="10000" class="form-control" name="jumlah" required>
                                </div>
                            </div>
                            <a class="btn btn-primary btn-round ml-auto mt-3" style="width: 100%;">
                                Tambah
                            </a>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                <div class="col-md-8">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Pembelian Obat</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php
                                                $i = 1;
                                                foreach ($supplier as $su) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $su['nama_supplier']; ?></td>
                                                <td><?= $su['no_kontak']; ?></td>
                                                <td><?= $su['alamat']; ?></td>
                                                <td><?= $su['alamat']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/hapus_supplier'); ?>/<?= $su['id']; ?>" class="btn btn-danger btn-circle btn-sm ml-3" onclick="return confirm('Yakin Mau Hapus?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i += 1;
                                                endforeach; ?> -->
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#obat").autocomplete({
            source: "<?php echo site_url('admin/get_autocomplete') ?>",
            select: function(event, ui) {
                $('[name="obat"]').val(ui.item.label);
                $('[name="hargabeli"]').val(ui.item.hargabeli);
                // $('[name="satuan"]').val(ui.item.satuan);
            }
        });
    });
</script>