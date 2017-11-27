<?php
include "init/init.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Mororapi Resto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
  </head>
  
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href=".">Mororapi Resro</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
    </ul>
    <ul class="navbar-nav">
    <?php 
      if(!isset($_SESSION['time'])){
    ?>
    <li class="nav-item">
        <a class="nav-link" href="login.php">Masuk</a>
    </li>
      <?php } ?>
    <?php 
      if(isset($_SESSION['time'])){
    ?>
    <input type="hidden" value="<?=($_SESSION['time'])?>" id="noNota">
    <input type="hidden" value="<?= tampilIdMeja($_SESSION['kode_meja']) ?>" id="idMeja">
    <li class="nav-item">
        <a class="nav-link" href="menu_checkout.php">Pesanan 
        <span class="badge badge-light" id="notifedNumber"><?= jumlahPesan($_SESSION['time']) ?></span></a>
    </li>
    <li class="nav-item">
    <!-- perlu konfirmasi sebelum keluar -->
        <a class="nav-link" href="menu_keluar.php" onclick="confirm('anda yakin  ?')">Keluar</a>
    </li>
    <?php
      }
    ?>
    </ul>
</div>
  </nav>
  <!-- Modal -->
<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nasi Goreng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="pesanError" class="alert alert-danger" role="alert" style="display:none">
            
            </div>
            <div id="pesanOk" class="alert alert-primary" role="alert" style="display:none">
            
            </div>
        <div class="row">
            
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <div class="input-group">
                    <label class="input-group-addon">Porsi : </label>
                    <span class="input-group-addon" id="kurangPorsi"> - </span>
                    <input type="number" class="form-control" id="jmlPorsi"></input>
                    <span class="input-group-addon" id="tambahPorsi"> + </span>
                </div>
                <input type="hidden" class="form-control" id="idMenu"></input>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="kePesan"> Ke Pesanan </button>
        <div id="loadingPesan" style="display:none;">Menggugah . . .</div>
        <button type="button" class="btn btn-primary" id="okPesan"> Ok </button>
        
      </div>
    </div>
  </div>
</div>