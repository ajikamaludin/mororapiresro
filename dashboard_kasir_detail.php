<?php
include "views/header_admin.php";

cekSession();

$nota = $_GET['p'];
$data = tampilBayar();

?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
                <div id="txtSelesaiBayar" class="alert alert-success" role="alert" style="display:none;">
                    Ini adalah halaman dashboard dapur untuk melihat pesanan
                </div>
                <div id="txtSelesaiBayar2" class="alert alert-danger" role="alert" style="display:none;">
                    Ini adalah halaman dashboard dapur untuk melihat pesanan
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=".">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                    </ol>
                </nav>
                <h1>No.<?= noNotaToNoMeja($nota) ?></h1>
                <table class="table table-striped" id="printTabel" border="1px">
                <thead>
                    <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th> Harga </th>
                    <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $datas = noNotaToMakanan($nota); 
                        $total = 0;
                        foreach ($datas as $nama) {
                    ?>
                    <tr>
                    <td><?= $nama['nama'] ?></td>
                    <td>  <?= idMenuNotaToJumlah($nota,$nama['id']) ?> </td>
                    <td>Rp. <?= $nama['harga'] ?></td>
                    <td>Rp. <?= idMenuNotaToJumlah($nota,$nama['id']) * $nama['harga']?></td>  
                    </tr>
                    <?php 
                        $total += idMenuNotaToJumlah($nota,$nama['id']) * $nama['harga'];
                        } 
                    ?>
                    <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total : </b></td>
                    <td>Rp. <span id="totalBayar"><?= $total ?></span></td>
                    </tr>
                </tbody>
                </table>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                    <label>Dibayar :</label>
                    <input type="text" class="form-control" style="margin-bottom:15px;" id="dibayar"/>
                    <p>Kembali : Rp. <span id="kembalian">0</span></p>
                    <button class="btn btn-primary" style="float:left" id="cetakNota">Cetak</button>
                    <button class="btn btn-success" style="float:right" id="selesaiBayar" data-nota="<?= $nota ?>">Selesai</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>