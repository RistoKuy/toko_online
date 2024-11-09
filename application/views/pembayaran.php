<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php $grand_total = 0;
                if ($keranjang = $this->cart->contents()) :
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo 'Total Belanja Anda : Rp. ' . number_format($grand_total, 0, ',', '.');

                    ?>
                </div> <br>
                <h3>Input Alamat Pengiriman dan Pembayaran</h3>

                <form method="get" action="<?= base_url('dashboard/proses_pesanan'); ?>">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" placeholder="Input Nama Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telpon</label>
                        <input type="text" name="no_telp" id="no_telp" placeholder="No Telpon Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jasa">Jasa Pengiriman</label>
                        <select name="jasa" id="jasa" class="form-control">
                            <option value="jne">JNE</option>
                            <option value="tiki">Tiki</option>
                            <option value="pos">Pos</option>
                            <option value="gojek">Gojek</option>
                            <option value="grab">Grab</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bank">Pilih Bank</label>
                        <select name="bank" id="bank" class="form-control">
                            <option value="bca">BCA</option>
                            <option value="bni">BNI</option>
                            <option value="bri">BRI</option>
                            <option value="mandiri">Mandiri</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mb-3" value="pesan">Simpan</button>
                </form>
            <?php else :
                echo 'Keranjang Belanja Anda Kosong';
            endif; ?>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>