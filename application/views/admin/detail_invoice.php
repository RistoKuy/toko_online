<div class="container-fluid">

    <h4>Detail Invoice <div>No. Invoice : <?= $invoice['id'] ?></div>
    </h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah Pesanan</th>
            <th>Harga Satuan</th>
            <th>Sub-total</th>
        </tr>
        <?php
        $total = 0;
        foreach ($pesanan as $p) :
            $subtotal = $p['jumlah'] * $p['harga'];
            $total += $subtotal;
            ?>
        <tr>
            <td><?= $p['id_barang'] ?></td>
            <td><?= $p['nama_barang'] ?></td>
            <td><?= $p['jumlah'] ?></td>
            <td><?= number_format($p['harga'], 0, ',', '.')  ?></td>
            <td><?= number_format($subtotal, 0, ',', '.')  ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?= number_format($total, 0, ',', '.'); ?></td>
        </tr>
    </table>

    <a href="<?= base_url('admin/invoice'); ?>" class="btn btn-outline-primary">Kembali</a>

</div>