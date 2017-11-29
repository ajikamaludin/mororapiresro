<?php
include "views/header.php";

cekSessionPengunjung();

$spesials = tampilMenuFavorit();
$makanans = tampilMenuMakananLimit();
$minumans = tampilMenuMinumanLimit();

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
                        <li class="breadcrumb-item active" aria-current="page">Spesial Minggu Ini</li>
                    </ol>
                </nav>
                
                <div class="card-group" style="margin-bottom:20px">
                <?php
                    foreach ($spesials as $spesial) {
                ?>
                <div class="card" style="width: 20rem;" >
                    <img class="card-img-top" src="<?= $spesial['gambar'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?= $spesial['nama'] ?></h4>
                        <p class="card-text">Rp. <?= $spesial['harga'] ?> / Porsi</p>
                        <?php if($spesial['stok'] <= 0){ ?>
                        <p class="alert alert-danger">
                            Habis
                        </p>
                        <?php }else{ ?>
                        <div class="btnPesan" data-id-pesan="<?= $spesial['id_menu'] ?>" data-stok="<?= $spesial['stok'] ?>">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
                    }
                ?>
                </div>

                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Makanan</li>
                    </ol>
                </nav>

                <div class="card-group" style="margin-bottom:20px">

                <?php
                foreach ($makanans as $makanan) {
                ?>
                <div class="card" style="width: 20rem;" >
                    <img class="card-img-top" src="<?= $makanan['gambar'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?= $makanan['nama'] ?></h4>
                        <p class="card-text">Rp. <?= $makanan['harga'] ?> / Porsi</p>
                        <?php if($makanan['stok'] <= 0){ ?>
                        <p class="alert alert-danger">
                            Habis
                        </p>
                        <?php }else{ ?>
                        <div class="btnPesan" data-id-pesan="<?= $makanan['id_menu'] ?>" data-stok="<?= $makanan['stok'] ?>">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
                    }
                ?>
                
                </div>
                
                <div style="margin-bottom:20px;">
                    <a href="menu_makanan.php"><button class="btn">Selangkapnya >>></button></a>    
                </div>

                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Minuman</li>
                    </ol>
                </nav>

                <div class="card-group" style="margin-bottom:20px">

                <?php
                    foreach ($minumans as $minuman) {
                ?>
                <div class="card" style="width: 20rem;" >
                    <img class="card-img-top" src="<?= $minuman['gambar'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?= $minuman['nama'] ?></h4>
                        <p class="card-text">Rp. <?= $minuman['harga'] ?> / Porsi</p>
                        <?php if($minuman['stok'] <= 0){ ?>
                        <p class="alert alert-danger">
                            Habis
                        </p>
                        <?php }else{ ?>
                        <div class="btnPesan" data-id-pesan="<?= $minuman['id_menu'] ?>" data-stok="<?= $minuman['stok'] ?>">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
                    }
                ?>
                
                </div>
                
                <div style="margin-bottom:20px;">
                    <a href="menu_minuman.php"><button class="btn">Selangkapnya >>></button></a>
                </div>

            </div>



            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>