<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url('assets/img/slider1.jpg') ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url('assets/img/slider2.jpg') ?>" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row text-center mt-3">
        <?php foreach ($elektronik as $el) : ?>
            <div class="card ml-3" style="width: 16rem;">
                <img src="<?= base_url('assets/uploads/' . $el['gambar']) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?= $el['nama_brg']; ?></h5>
                    <small><?= $el['keterangan']; ?></small> <br>
                    <span class="badge badge-pill badge-success mb-3">Rp.<?= number_format($el['harga'], 0, ',', '.'); ?></span>
                    <?= anchor('dashboard/tambah_keranjang/' . $el['id_brg'], '<div class="btn btn-sm btn-primary">Tambah ke keranjang</div>') ?>
                    <a href="<?= base_url('dashboard/detail/' . $el['id_brg']) ?>" class="btn btn-sm btn-success mb-0">Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>