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
    <?php
      if(isset($_SESSION['user'])){
        
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li>
            <a class="nav-link" href="dashboard_main.php">Dashboard</a>
          </li>
          <li>
            <a class="nav-link" href="dashboard_kasir.php">Kasir</a>
          </li>
          <li>
            <a class="nav-link" href="dashboard_menu.php">Menu</a>
          </li>
          <li>
            <a class="nav-link" href="dashboard_meja.php">Meja</a>
          </li>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Keluar</a>
        </li>
        </ul>
    </div>
    <?php
      }
    ?>
  </nav>