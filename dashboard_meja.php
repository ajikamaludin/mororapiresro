<?php
include "views/header_admin.php";

cekSession();

$data = tampilMeja();

?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
                <div class="alert alert-success" role="alert" style="display: none">
                    Ini adalah halaman dashboard meja
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=".">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meja</li>
                    </ol>
                </nav>
                <button class="btn" style="margin-bottom: 20px;" data-toggle="modal" data-target="#modalTambah"> Tambah </button>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No Meja</th>
                    <th scope="col">Kode Meja</th>
                    <th> Aksi </th>
                    </tr>
                </thead>
                <tbody id="tabelMeja">
                <?php foreach ($data as $meja){  ?>
                    <tr>
                    <td><h1><?= $meja['no_meja'] ?></h1></td>
                    <td><?= $meja['kode_meja'] ?></td>
                    <td>
                        <button class="btn">Ubah</button>
                        <button class="btn">Hapus</button>
                    </td>  
                    </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>

<!-- Modal Tambah Meja-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Meja Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="pesan" class="alert alert-danger" role="alert" style="display:none">
            
        </div>
        <div id="pesan2" class="alert alert-primary" role="alert" style="display:none">
            
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">No Meja</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="inputNoMeja">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Kode Meja</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputKodeMeja">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
        <button type="button" class="btn btn-primary" id="simpanMeja">Simpan</button>
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