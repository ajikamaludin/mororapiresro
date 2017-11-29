<?php
include "views/header_admin.php";

cekSession();

$data = tampilMenuFavorit();
$menus = tampilMenuSemua();

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
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Spesial Minggu Ini</li>
                    </ol>
                </nav>
                
                <div id="groupSpesial" class="card-group" style="margin-bottom:20px">
                <?php
                    foreach ($data as $favorit) {
                ?>
                <div class="card" style="width: 20rem;" id="spesial_<?= $favorit['id_menu'] ?>" >
                
                    <img class="card-img-top" src="<?= $favorit['gambar'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?= $favorit['nama'] ?></h4>
                        <p class="card-text">Rp. <?= $favorit['harga'] ?> / Porsi</p>
                        <div class="btnUbahSpesial"data-id-spesial="<?= $favorit['id_menu'] ?>" >
                            <button class="btn btn-secondary" style="margin-bottom:5px;">Ubah</button>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>

                </div>
<!-- Modal Ubah Spesial-->
<div class="modal fade" id="modalUbahSpesial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Menu Spesial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="pesanSpesial" class="alert alert-danger" role="alert" style="display:none">
            
        </div>
        <div id="pesanSpesial2" class="alert alert-primary" role="alert" style="display:none">
            
        </div>

        <div class="form-group row">
            <label for="selectMenu" class="col-sm-3 col-form-label">Menu</label>
            <div class="col-sm-9">
                <select id="selectMenu" class="form-control">
                    <option selected value="0">Pilih...</option>
                    <?php foreach ($menus as $menu) { ?>
                    <option value="<?= $menu['id_menu'] ?>"><?= $menu['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="hidden" id="ubahIdSpesial"/>
        </label>
        </div>
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="simpanSpesial">Simpan</button>
        <div id="loadingSpesial" style="display:none;">Menggugah . . .</div>
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