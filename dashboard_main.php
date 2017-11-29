<?php
include "views/header_admin.php";

cekSession();
$data = tampilMasak();
?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
                <div id="txtSelesaiMasak" class="alert alert-success" role="alert" style="display:none;">
                    Ini adalah halaman dashboard dapur untuk melihat pesanan
                </div>
                <div id="txtSelesaiMasak2" class="alert alert-danger" role="alert" style="display:none;">
                    Ini adalah halaman dashboard dapur untuk melihat pesanan
                </div>

                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                    </ol>
                </nav>

                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No Meja</th>
                    <th scope="col">Pesanan</th>
                    <th scope="col">Selesai</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $masak) { ?>
                    <tr id="dapur_<?= $masak['no_nota'] ?>">
                    <td><h1><?= noNotaToNoMeja($masak['no_nota'])  ?></h1></td>
                    <td>
                        <?php $datas = noNotaToMakanan($masak['no_nota']); 
                            foreach ($datas as $nama) {
                        ?>
                            <p><input class="checkboxDapur" type="checkbox" data-id="<?= $masak['id_transaksi']?>"> 
                            <?= $nama['nama'] ?> : 
                            <?= idMenuNotaToJumlah($masak['no_nota'],$nama['id']) ?> </p>
                        <?php
                            }
                        ?>
                        
                    </td>
                    <td><button class="btn btn-primary" id="selesaiMasak" data-nota="<?= $masak['no_nota'] ?>">Selesai</button></td>  
                    </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>
    <script>
        /* console.log('reload: start');
        setInterval(function(){ location.reload() }, 30000); */
    </script>
<?php
    include "views/footer.php";
?>