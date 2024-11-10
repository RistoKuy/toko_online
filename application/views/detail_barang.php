<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <?php foreach ($barang as $brg) : ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url('uploads/' . $brg['gambar']); ?>" class="card-img-top" alt="">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Nama Product</td>
                            <td> <strong><?= $brg['nama_brg']; ?></strong> </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td> <strong><?= $brg['keterangan']; ?></strong> </td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td> <strong><?= $brg['kategori']; ?></strong> </td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td> <strong><?= $brg['stok']; ?></strong> </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td> <strong>
                                    <div class="btn btn-sm btn-success">
                                        Rp. <?= number_format($brg['harga'], 0, ',', '.') ?>
                                    </div>
                                </strong> </td>
                        </tr>
                    </table>
                    <a href="<?= base_url('dashboard/index') ?>" class="btn btn-sm btn-secondary mb-0">Kembali</a>
                    <?= anchor('dashboard/tambah_keranjang/' . $brg['id_brg'], '<div class="btn btn-sm btn-primary">Tambah ke keranjang</div>') ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>