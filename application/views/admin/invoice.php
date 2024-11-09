<div class="container-fluid">
    <h4>Invoice Pemesanan product</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Id Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pesan</th>
            <th>Batas Bayar</th>
            <th>Aksi</th>
        </tr>

        <?php if (is_array($invoice) || is_object($invoice)) : ?>
        <?php foreach ($invoice as $i) : ?>
        <tr>
            <td><?= $i['id'] ?></td>
            <td><?= $i['nama'] ?></td>
            <td><?= $i['alamat'] ?></td>
            <td><?= $i['tgl_pesan'] ?></td>
            <td><?= $i['batas_bayar'] ?></td>
            <td>
                <a href="<?= base_url('admin/invoice/detail/' . $i['id']) ?>" class="btn btn-primary">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>