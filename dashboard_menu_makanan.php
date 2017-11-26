<?php
include "views/header_admin.php";

cekSession();

$data = tampilMenuMakanan();

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
                        <li class="breadcrumb-item"><a href=".">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Makanan</li>
                    </ol>
                </nav>
                <button class="btn btn-success" style="margin-bottom: 20px;" data-toggle="modal" data-target="#modalMakananTambah"> Tambah </button>
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
                <tbody>
                <?php
                    foreach ($data as $makanan) {
                ?>
                    <tr>
                    <th scope="row"><img class="card-img-top" style="width:10rem" src="<?= $makanan['gambar'] ?>" alt="<?= $makanan['nama'] ?>"></th>
                    <td><?= $makanan['nama'] ?></td>
                    <td>Rp. <?= $makanan['harga'] ?> / Porsi</td>
                    <td><?= $makanan['stok'] ?></td>
                    <td>
                        <div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMeja">
                            <button class="btn  btn-secondary">Ubah</button>
                        </div>
                        <div class="btnHapusMeja">
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
<div class="modal fade" id="modalMakananTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Makanan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="pesanMakanan" class="alert alert-danger" role="alert" style="display:none">
            
        </div>
        <div id="pesanMaknan2" class="alert alert-primary" role="alert" style="display:none">
            
        </div>
        <div class="form-group row">
            <label for="inputNamaMakanan" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputNamaMakanan">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputHargaMakanan" class="col-sm-3 col-form-label">Harga</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputHargaMakanan">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputStokMakanan" class="col-sm-3 col-form-label">Stok</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputStokMakanan">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputGambarMakanan" class="col-sm-3 col-form-label">Gambar</label>
            <div class="col-sm-9">
            <label class="custom-file">
                <input type="file" id="fileGambar" class="custom-file-input" require>
            <span class="custom-file-control"></span>
            </div>
        </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="simpanMakanan">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ubah Makanan-->
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="pesanUbah" class="alert alert-danger" role="alert" style="display:none">
            
        </div>
        <div id="pesan2Ubah" class="alert alert-primary" role="alert" style="display:none">
            
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">No Meja</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="inputUbahNoMeja">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Kode Meja</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputUbahKodeMeja">
            </div>
            <input style="display:none;" type="text" class="form-control" id="inputUbahIdMeja">
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
        <button type="button" class="btn btn-primary" id="ubahMeja">Simpan</button>
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