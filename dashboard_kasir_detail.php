<?php
include "views/header_admin.php";

cekSession();

?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
                <div class="alert alert-success" role="alert">
                    Ini adalah halaman dashboard kasir detail
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=".">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                    </ol>
                </nav>
                <h1>No.14</h1>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th> Harga </th>
                    <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Ayam Goreng</td>
                    <td> 2 </td>
                    <td>Rp. 10000</td>
                    <td>Rp. 20000</td>  
                    </tr>
                    <tr>
                    <td>Ayam Goreng</td>
                    <td> 2 </td>
                    <td>Rp. 10000</td>
                    <td>Rp. 20000</td>  
                    </tr>
                    <tr>
                    <td>Ayam Goreng</td>
                    <td> 2 </td>
                    <td>Rp. 10000</td>
                    <td>Rp. 20000</td>  
                    </tr>
                    <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total</b></td>
                    <td><b>Rp. 60000</b></td>  
                    </tr>
                </tbody>
                </table>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                    <label>Dibayar :</label>
                    <input type="text" class="form-control" style="margin-bottom:15px;"/>
                    <p>Kembali : Rp. 40000</p>
                    <button class="btn" style="float:right">Selesai</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>