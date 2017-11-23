<?php
include "views/header.php";
?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
                <div class="alert alert-success" role="alert">
                    Ini adalah halaman checkout
                </div>

                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="menu.php">Menu</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                    </ol>
                </nav>

                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Sub</th>
                    <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Nasi Goreng</td>
                    <td>2</td>
                    <td>Rp 10.000</td>
                    <td>Rp 20.000</td>
                    <td><button class="btn">Hapus</button></td>  
                    </tr>
                    <tr>
                    <td>Nasi Goreng</td>
                    <td>2</td>
                    <td>Rp 10.000</td>
                    <td>Rp 20.000</td>
                    <td><button class="btn">Hapus</button></td>  
                    </tr>
                    <tr>
                    <td>Nasi Goreng</td>
                    <td>2</td>
                    <td>Rp 10.000</td>
                    <td>Rp 20.000</td>
                    <td><button class="btn">Hapus</button></td>  
                    </tr>
                    <tr>
                    <td></td>
                    <td></td>
                    <td>Total : </td>
                    <td>Rp 60.000</td>
                    <td></td>  
                    </tr>
                </tbody>
                </table>
                <button class="btn">Batal</button>
                <button class="btn">Konfirmasi</button>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>