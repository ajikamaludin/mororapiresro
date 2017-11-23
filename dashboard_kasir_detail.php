<?php
include "views/header_admin.php";
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

                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No Meja</th>
                    <th scope="col">Pesanan</th>
                    <th> Total </th>
                    <th scope="col">Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><h1>14</h1></td>
                    <td>
                        <p>Nasi Goreng : 2</p>
                        <p>Es Teh : 2</p>
                        <p>Susu Seger : 2</p>
                    </td>
                    <td>Rp. 20.000 </td>
                    <td><button class="btn">Bayar</button></td>  
                    </tr>
                    <tr>
                    <td><h1>21</h1></td>
                    <td>
                        <p>Nasi Goreng : 2</p>
                        <p>Es Teh : 2</p>
                        <p>Susu Seger : 2</p>
                    </td>
                    <td>Rp. 20.000 </td>
                    <td><button class="btn">Bayar</button></td>  
                    </tr>
                </tbody>
                </table>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>