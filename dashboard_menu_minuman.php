<?php
include "views/header_admin.php";

cekSession();

$data = tampilMenuFavorit();

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
                        <li class="breadcrumb-item active" aria-current="page">Minuman</li>
                    </ol>
                </nav>
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
                    <tr>
                    <th scope="row"><img class="card-img-top" style="width:10rem" src="asset/image/dummy/background.png" alt="Card image cap"></th>
                    <td>Nasi Goreng</td>
                    <td>Rp. 10.000 / Porsi</td>
                    <td>20</td>
                    <td>
                        <div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMeja">
                            <button class="btn  btn-secondary">Ubah</button>
                        </div>
                        <div class="btnHapusMeja">
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><img class="card-img-top" style="width:10rem" src="asset/image/dummy/background.png" alt="Card image cap"></th>
                    <td>Nasi Goreng</td>
                    <td>Rp. 10.000 / Porsi</td>
                    <td>20</td>
                    <td>
                        <div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMeja">
                            <button class="btn  btn-secondary">Ubah</button>
                        </div>
                        <div class="btnHapusMeja">
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row"><img class="card-img-top" style="width:10rem" src="asset/image/dummy/background.png" alt="Card image cap"></th>
                    <td>Nasi Goreng</td>
                    <td>Rp. 10.000 / Porsi</td>
                    <td>20</td>
                    <td>
                        <div style="float:left;margin-right:5px;margin-bottom:5px;" class="btnUbahMeja">
                            <button class="btn  btn-secondary">Ubah</button>
                        </div>
                        <div class="btnHapusMeja">
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </td>
                    </tr>
                </tbody>
                </table>

<!--                 <div class="card-group" style="margin-bottom:20px">

                    <div class="card"  style="width: 20rem;">
                        <img class="card-img-top" src="asset/image/dummy/background.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nasi Goreng</h4>
                            <p class="card-text">Rp. 10.000 / Porsi</p>
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                    <div class="card"  style="width: 20rem;">
                        <img class="card-img-top" src="asset/image/dummy/background.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nasi Goreng</h4>
                            <p class="card-text">Rp. 10.000 / Porsi</p>
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                    <div class="card"  style="width: 20rem;">
                        <img class="card-img-top" src="asset/image/dummy/background.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nasi Goreng</h4>
                            <p class="card-text">Rp. 10.000 / Porsi</p>
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                    <div class="card"  style="width: 20rem;">
                        <img class="card-img-top" src="asset/image/dummy/background.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nasi Goreng</h4>
                            <p class="card-text">Rp. 10.000 / Porsi</p>
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                
                </div> -->
                
            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>