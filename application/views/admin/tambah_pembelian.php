<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-4">
                    <!-- <div class="auto-scroll"> -->
                    <form method="post" action="<?= base_url('admin/tambahpembelian'); ?>">
                        <div class="card">
                            <div class="card-body">

                                <div class="separator-solid"></div>

                                <label class="mb-2">Obat</label>
                                <input type="text" class="form-control" id="obat" name="obat" placeholder="Masukkan nama obat">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="mb-2 mt-2">Jumlah</label>
                                        <input type="number" min="1" class="form-control" name="jumlah" id="jumlah">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="mb-2 mt-2">Satuan</label>
                                        <input type="text" class="form-control" name="satuan" id="satuan" readonly>
                                    </div>

                                </div>

                                <label class="mb-2 mt-2">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="username-addon">Rp.</span>
                                    </div>
                                    <input type="text" readonly class="form-control" aria-label="Harga beli" aria-describedby="username-addon" name="harga_beli" id="harga_beli" value="">
                                </div>

                                <button type="submit" class=" add_cart btn btn-primary btn-round ml-auto mt-3" style="width: 100%;">
                                    Tambah
                                </button>

                                <!-- <button class="add_cart btn btn-success btn-block" data-produkid="<?php echo $row->produk_id; ?>" data-produknama="<?php echo $row->produk_nama; ?>" data-produkharga="<?php echo $row->produk_harga; ?>">Add To Cart</button> -->
                    </form>
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
                                <?php $total = 0; ?>
                                <?php foreach ($rincian_pembelian as $rp) : ?>
                                    <tr>
                                        <td><?= $rp['obat']; ?></td>
                                        <td><?= number_format($rp['harga']); ?></td>
                                        <td><?= $rp['jumlah']; ?></td>
                                        <?php $total = $rp['harga'] * $rp['jumlah']; ?>
                                        <td><?= number_format($total); ?></td>
                                        <td><a href="<?= base_url('admin/hapus_barang'); ?>/<?= $rp['id']; ?>"><i class="fas fa-fw fa-trash text-danger"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                    <center><a href="<?= base_url('admin/checkout'); ?>" class=" btn btn-primary btn-round">Checkout</a> </center>
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

<!-- <script type="text/javascript">
    $(document).ready(function() {

        $("#obat").autocomplete({
            source: "<?php echo site_url('admin/get_autocomplete'); ?>",

            select: function(event, ui) {
                $('[name="obat"]').val(ui.item.label);
                $('[name="harga_beli"]').val(ui.item.harga_beli);
                $('[name="satuan"]').val(ui.item.id_satuan);
                // $('[name="satuan"]').val(ui.item.satuan);
            }
        });
    });
</script> -->