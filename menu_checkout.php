<?php
include "views/header.php";

cekSessionPengunjung();
$data = tampilCheckout($_SESSION['time']);
?>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top:70px">
                <?php if($_SESSION['konfirmasi'] == 'ok'){ ?>
                <div id="checkOutOk" class="alert alert-success" role="alert">
                    Mohon Tunggu, Pesanan Anda Sedang di masak . . .
                </div>
                <?php } ?>

                <div id="checkOutOk" class="alert alert-success" role="alert" style="display:none;">
                    
                </div>
                <div id="checkOutError" class="alert alert-danger" role="alert" style="display:none;">
                    
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
                    <?php foreach ($data as $pesanan) {
                        if($pesanan['status'] == "pesan"){
                    ?>
                    <tr id="pesan_<?= $pesanan['id_transaksi'] ?>">
                        <td><?= tampilNamaMenuBy($pesanan['id_menu']) ?></td>
                        <td><?= $pesanan['jml_porsi'] ?></td>
                        <td>Rp <?= tampilHargaMenuBy($pesanan['id_menu']) ?></td>
                        <td>Rp <?= tampilHargaMenuBy($pesanan['id_menu']) * $pesanan['jml_porsi'] ?></td>
                    <td>
                    <div id="btnBatalPesan1" data-id-pesan="<?= $pesanan['id_transaksi'] ?>">
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                    </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>

                </tbody>
                </table>
                <div style="float:right;margin-top:20px;">
                <?php if(!$_SESSION['konfirmasi'] == 'ok'){ ?>
                    <button class="btn btn-success" id="btnKonfirm">Konfirmasi</button>
                    <button class="btn btn-secondary" id="btnBatalPesan">Batal</button>
                <?php } ?>
                </div>
            </div>
<!-- Modal -->
<div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
      </div> -->
      <div class="modal-body">
            <h4>Anda Yakin ingin mengkonfirmasi pesanan?</h4>
            <p>pesanan yang telah di konfirmasi tidak dapat dibatalkan</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="yaKonfirmasi"> Ya </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tidak </button>
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