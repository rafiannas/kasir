<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
    <center>
        <label>
            <h3><b>Apotek Griya Cinere</b></h3><br>
            Ruko Griya Cinere II Blok 49 No.13 Limo, Depok. Telp.021-7530446
        </label>
    </center>
    <hr>
    <?php foreach ($pembelian as $p) : ?>
    <?php endforeach; ?>
    <br>
    <table>
        <tr>
            <td>No.Pembelian</td>
            <td>: GC<?= $p['id']; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: <?= $p['tgl']; ?></td>
        </tr>
    </table>
    <p></p>
    <table width="100%" border="1">
        <tr>
            <th align="center">Obat</th>
            <th align="center">Harga</th>
            <th align="center">Jumlah</th>
            <th align="center">Total</th>
        </tr>
        <?php $all = 0;
        foreach ($detail_beli as $rp) : ?>
            <tr>
                <td><?= $rp['obat']; ?></td>
                <td align="center"><?= number_format($rp['harga']); ?></td>
                <td align="center"><?= $rp['jumlah']; ?></td>
                <?php $total = $rp['harga'] * $rp['jumlah']; ?>
                <?php $all += $total; ?>
                <td align="right"><?= number_format($total); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" align="right"><strong>Total </strong></td>
            <td align="right"><?= number_format($all); ?></td>
        </tr>
        <tr>
            <td colspan="3" align="right"><strong>PPN (10%)</strong></td>
            <?php $ppn = $all * 0.1 ?>
            <td align="right"><?= number_format($ppn); ?></td>
        </tr>

        <tr>
            <td colspan="3" align="right"><strong>Total Harga</strong></td>
            <?php $ppn = $all * 0.1 ?>
            <td align="right"><strong><?= number_format($ppn + $all); ?></strong></td>
        </tr>
        <tr>
            <td colspan="3" align="right"><strong>Bayar Tunai</strong></td>
            <td align="right"><strong><?= number_format($p['total_bayar']); ?></strong></td>
        </tr>

        <tr>
            <td colspan="3" align="right"><strong>Kembalian</strong></td>
            <?php $ppn = $all * 0.1 ?>
            <td align="right"><strong><?= number_format($p['kembalian']); ?></strong></td>
        </tr>
    </table>

    <br><br>
    <label>Kasir : <?= $p['nama']; ?> </label>

    <center>
        <label>
            <h4><b>======================= Terimakasih Atas Kunjungan Anda =======================</b></h4>
        </label>
    </center>

</body></html>