<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
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

    <!-- Product Cards -->
    <div class="row text-center mt-3">
        <?php foreach ($barang as $brg) : ?>
            <div class="card ml-3" style="width: 16rem;">
                <img src="<?php echo base_url().'assets/uploads/'.$brg->gambar ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5>
                    <small><?php echo $brg->keterangan ?></small><br>
                    <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($brg->harga, 0, ',', '.'); ?></span>
                    <?= anchor('dashboard/tambah_keranjang/' . $brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah ke keranjang</div>') ?>
                    <a href="#" class="btn btn-sm btn-success">Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Product Preview Modal -->
    <div class="modal fade" id="productPreviewModal" tabindex="-1" role="dialog" aria-labelledby="productPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productPreviewModalLabel">Preview Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="previewImage" src="" class="img-fluid" alt="...">
                    <h5 id="previewTitle" class="mt-3"></h5>
                    <p id="previewDescription"></p>
                    <span id="previewPrice" class="badge badge-pill badge-success mb-3"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Keranjang Belanja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="cart-items" class="list-group">
                        <!-- Cart items will be appended here -->
                    </ul>
                    <div class="mt-3">
                        <h5>Total Harga: Rp. <span id="total-price">0</span></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        $(document).ready(function() {
            $('.btn-success').on('click', function() {
                var image = $(this).closest('.card').find('.card-img-top').attr('src');
                var title = $(this).closest('.card').find('.card-title').text();
                var description = $(this).closest('.card').find('small').text();
                var price = $(this).closest('.card').find('.badge').text();
    
                $('#previewImage').attr('src', image);
                $('#previewTitle').text(title);
                $('#previewDescription').text(description);
                $('#previewPrice').text(price);
    
                $('#productPreviewModal').modal('show');
            });
        });
    </script>

</body>
</html>