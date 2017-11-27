<?php
include "views/header.php";

cekSessionPengunjung();
$data = tampilMenuMakanan();
?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
            <div id="txtPesanMenu" class="alert alert-success" role="alert" style="display:none">
                    Pesanan Anda Kami Terima dan sedang kami proses
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="menu.php">Menu</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Makanan</li>
                    </ol>
                </nav>

                <div style="float: none; margin-bottom:20px">
                <?php
                    foreach ($data as $makanan) {
                ?>
                    <div class="card" style="width: 15rem;float: left;margin-bottom:10px;">
                        <img class="card-img-top" src="<?= $makanan['gambar'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?= $makanan['nama'] ?></h4>
                            <p class="card-text">Rp. <?= $makanan['harga'] ?> / Porsi</p>
                            <div class="btnPesan" data-id-pesan="<?= $makanan['id_menu'] ?>">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
             
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>