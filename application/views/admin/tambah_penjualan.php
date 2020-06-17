<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-4">
                    <!-- <div class="auto-scroll"> -->
                    <form method="post" action="<?= base_url('admin/tambahpenjualan'); ?>">
                        <div class="card">
                            <div class="card-body">
                                <label class="mb-2">Obat</label>
                                <div class="select2-input">
                                    <select id="basic" name="obat" class="form-control" required>
                                        <option value="">- Pilih Obat-</option>
                                        <?php foreach ($dataobat as $p) : ?>
                                            <option value="<?= $p['id']; ?>"><?= $p['nama_obat']; ?> : <?= $p['tipe']; ?> <?= $p['netto']; ?> <?= $p['satuan']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="mb-2 mt-2">Jumlah</label>
                                        <input type="number" min="1" class="form-control" name="jumlah" id="jumlah">
                                    </div>
                                </div>
                                <button type="submit" class=" add_cart btn btn-primary btn-round ml-auto mt-3" style="width: 100%;">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Obat</h4>
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
                                        <?php foreach ($rincian_penjualan as $rp) : ?>
                                            <tr>
                                                <td><?= $rp['obat']; ?></td>
                                                <td><?= number_format($rp['harga_per_obat']); ?></td>
                                                <td><?= $rp['jumlah']; ?></td>
                                                <?php $total = $rp['harga_per_obat'] * $rp['jumlah']; ?>
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