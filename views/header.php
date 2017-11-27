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