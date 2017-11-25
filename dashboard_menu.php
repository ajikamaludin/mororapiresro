<?php
include "views/header_admin.php";

cekSession();

$data = tampilMenuFavorit();
$makanans = tampilMenuMakanan();
$minumans = tampilMenuMinuman();

?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
                <div class="alert alert-success" role="alert" style="display:none;">
                    Ini adalah halaman dashboard menu untuk melihat menu meng edit dan menamah 
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Spesial Minggu Ini</li>
                    </ol>
                </nav>
                
                <div class="card-group" style="margin-bottom:20px">
                <?php
                    foreach ($data as $favorit) {
                ?>
                <div class="card" style="width: 20rem;" >
                
                    <img class="card-img-top" src="<?= $favorit['gambar'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?= $favorit['nama'] ?></h4>
                        <p class="card-text">Rp. <?= $favorit['harga'] ?> / Porsi</p>
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:5px;">Ubah</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:5px;">Hapus</button>
                    </div>
                </div>
                <?php
                    }
                ?>

                <div class="card" style="width: 20rem;" >
                    <img class="card-img-top" src="asset/image/dummy/background.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Favorit</h4>
                        <p class="card-text">Rp. Harga / Porsi</p>
                        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:5px;">Tambah</button>
                    </div>
                </div>

                </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>

// makanan dan minuman ditampilkan dalam bentuk tabel