<div class="container-fluid">
    <h4>Keranjang Belanja</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
            <th>Aksi</th> <!-- Add this line -->
        </tr>
        <?php
        $no = 1;
        foreach ($this->cart->contents() as $items) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $items['name']; ?></td>
                <td><?= $items['qty']; ?></td>
                <td align="right">Rp. <?= number_format($items['price'], 0, ',', '.'); ?></td>
                <td align="right">Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
                <td><a href="<?= base_url('dashboard/hapus_item_keranjang/' . $items['rowid']); ?>" class="btn btn-sm btn-danger">Hapus</a></td> <!-- Add this line -->
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5" align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
        </tr>
    </table>
    <div class="text-right">
        <a class="btn btn-sm btn-danger" href="<?= base_url('dashboard/hapus_keranjang'); ?>" onclick="javascript: confirm('Yakin?')">Hapus Keranjang</a>
        <a class="btn btn-sm btn-primary" href="<?= base_url('dashboard/back'); ?>">Lanjutkan Belanja</a>
        <a class="btn btn-sm btn-success" href="<?= base_url('dashboard/pembayaran'); ?>">Pembayaran</a>
    </div>
</div>