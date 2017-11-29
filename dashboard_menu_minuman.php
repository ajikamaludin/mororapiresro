<?php
include "views/header_admin.php";

cekSession();

$data = tampilMenuMinuman();

?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
                <div id="pesanMinumanDash" class="alert alert-success" role="alert" style="display:none;">
                    
                </div>
                <div id="pesanMinumanDash2" class="alert alert-danger" role="alert" style="display:none;">
                    
                </div>
                
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Minuman</li>
                    </ol>
                </nav>
                <button class="btn btn-success" style="margin-bottom: 20px;" data-toggle="modal" data-target="#modalMinumanTambah"> Tambah </button>
                <table class="table table-striped table-responsive-sm">
                <thead>
                    <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabelMinuman">
                <?php
                    foreach ($data as $minuman) {
                ?>
                    <tr id="minuman_<?= $minuman['id_menu'] ?>">
                    <th scope="row"><img class="card-img-top" style="width:10rem" src="<?= $minuman['gambar'] ?>" alt="<?= $minuman['nama'] ?>"></th>
                    <td><?= $minuman['nama'] ?></td>
                    <td>Rp. <?= $minuman['harga'] ?> / Porsi</td>
                    <td><?= $minuman['stok'] ?></td>
                    <td>
                        <div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMinuman"
                        data-id-minuman="<?= $minuman['id_menu'] ?>"
                        data-nama-minuman="<?= $minuman['nama'] ?>" 
                        data-harga-minuman="<?= $minuman['harga'] ?>" 
                        data-stok-minuman="<?= $minuman['stok'] ?>" 
                        data-gambar-minuman="<?= $minuman['gambar'] ?>"
                        >
                            <button class="btn  btn-secondary">Ubah</button>
                        </div>
                        <div class="btnHapusMinuman" data-id-minuman="<?= $minuman['id_menu'] ?>" >
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
                </table>

<!-- Modal Tambah Makanan-->
<div class="modal fade" id="modalMinumanTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Minuman Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="pesanMinuman" class="alert alert-danger" role="alert" style="display:none">
            
        </div>
        <div id="pesanMinuman2" class="alert alert-primary" role="alert" style="display:none">
            
        </div>
        <div class="form-group row">
            <label for="inputGambarMinuman" class="col-sm-3 col-form-label">Gambar</label>
            <div class="col-sm-9">
            <label class="custom-file">
                <input type="file" id="fileGambar" class="custom-file-input" require>
            <span class="custom-file-control"></span>
            </div>
        </label>
        </div>

        <div class="form-group row">
            <label for="inputNamaMinuman" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNamaMinuman">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputHargaMinuman" class="col-sm-3 col-form-label">Harga</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputHargaMinuman">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputStokMinuman" class="col-sm-3 col-form-label">Stok</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputStokMinuman">
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="simpanMinuman">Simpan</button>
        <div id="loadingSimpan" style="display:none;">Menggugah . . .</div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ubah Makanan-->
<div class="modal fade" id="modalUbahMinuman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Menu Minuman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="pesanUbahMinuman" class="alert alert-danger" role="alert" style="display:none">
            
        </div>
        <div id="pesanUbahMinuman2" class="alert alert-primary" role="alert" style="display:none">
            
        </div>
        <div class="form-group row">
            <label for="inputGambarMinuman" class="col-sm-3 col-form-label">Gambar</label>
            <div class="col-sm-9">
            <label class="custom-file">
                <input type="file" id="ubahfileGambar" class="custom-file-input" require>
            <span class="custom-file-control"></span>
            </div>
        </label>
        </div>

        <div class="form-group row">
            <label for="inputNamaMinuman" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputUbahNamaMinuman">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputHargaMinuman" class="col-sm-3 col-form-label">Harga</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputUbahHargaMinuman">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputStokMinuman" class="col-sm-3 col-form-label">Stok</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputUbahStokMinuman">
            </div>
            <input type="text" class="form-control" id="inputUbahIdMinuman" style="display:none">
            <input type="text" class="form-control" id="inputUbahGambarMinuman" style="display:none">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="ubahMinuman">Simpan</button>
        <div id="loadingSimpan2" style="display:none;">Menggugah . . .</div>
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