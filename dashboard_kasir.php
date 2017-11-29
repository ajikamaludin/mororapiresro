<?php
include "views/header_admin.php";

cekSession();
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
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Kasir</li>
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
                <?php 
                
                foreach ($data as $bayar) { 
                    $total = '0';
                    ?>
                    <tr id="nota_<?= $bayar['no_nota'] ?>">
                    <td><h1><?= noNotaToNoMeja($bayar['no_nota'])  ?></h1></td>
                    <td>
                        <?php $datas = noNotaToMakanan($bayar['no_nota']); 
                            foreach ($datas as $nama) {
                        ?>
                            <p> <?= $nama['nama'] ?> : <?= idMenuNotaToJumlah($bayar['no_nota'],$nama['id']) ?> </p>
                            
                        <?php
                                $jumlah = idMenuNotaToJumlah($bayar['no_nota'],$nama['id']) * $nama['harga'];
                                $total += $jumlah;
                            }
                        ?>
                    </td>
                    <td>Rp. <?= $total ?> </td>
                    <td>
                        <?php if(getStatus($bayar['no_nota']) == 'masak'){ ?>
                        <div class="batalBayar" data-nota="<?=$bayar['no_nota']?>" style="float:left;margin-right:5px;margin-bottom:5px">
                            <button class="btn">Batal</button>
                        </div>
                        <?php } ?>
                        <a href="dashboard_kasir_detail.php?p=<?=$bayar['no_nota']?>"><button class="btn btn-primary">Bayar</button></a>
                        
                    </td>  
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>
<?php
    include "views/footer.php";
?>