<?php
include "views/header_admin.php";
?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
                <div class="alert alert-success" role="alert">
                    Ini adalah halaman dashboard meja
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=".">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meja</li>
                    </ol>
                </nav>
                <button class="btn" style="margin-bottom: 20px;"> Tambah </button>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No Meja</th>
                    <th scope="col">Kode Meja</th>
                    <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><h1>14</h1></td>
                    <td>MEMJ014</td>
                    <td>
                        <button class="btn">Ubah</button>
                        <button class="btn">Hapus</button>
                    </td>  
                    </tr>
                    <tr>
                    <td><h1>15</h1></td>
                    <td>MEMJ015</td>
                    <td>
                        <button class="btn">Ubah</button>
                        <button class="btn">Hapus</button>
                    </td>  
                    </tr>
                    <tr>
                    <td><h1>16</h1></td>
                    <td>MEMJ016</td>
                    <td>
                        <button class="btn">Ubah</button>
                        <button class="btn">Hapus</button>
                    </td>  
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