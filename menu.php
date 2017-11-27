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
                        <div class="btnPesan" data-id-pesan="<?= $spesial['id_menu'] ?>">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
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
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pesanModal">Pesan</a>
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
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pesanModal">Pesan</a>
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

<!-- Modal -->
<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nasi Goreng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="pesanError" class="alert alert-danger" role="alert" style="display:none">
            
            </div>
            <div id="pesanOk" class="alert alert-primary" role="alert" style="display:none">
            
            </div>
        <div class="row">
            
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <div class="input-group">
                    <label class="input-group-addon">Porsi : </label>
                    <span class="input-group-addon" id="kurangPorsi"> - </span>
                    <input type="number" class="form-control" id="jmlPorsi"></input>
                    <span class="input-group-addon" id="tambahPorsi"> + </span>
                </div>
                <input type="hidden" class="form-control" id="idMenu"></input>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="kePesan"> Ke Pesanan </button>
        <div id="loadingPesan" style="display:none;">Menggugah . . .</div>
        <button type="button" class="btn btn-primary" id="okPesan"> Ok </button>
        
      </div>
    </div>
  </div>
</div>

            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>