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
    
    <?php
      if(isset($_SESSION['user'])){
        
    ?>
    <a class="navbar-brand" href="login.php">Mororapi Resto</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <?php if($_SESSION['status'] == 'dapur' || $_SESSION['status'] == 'admin'){ ?>
          <li>
            <a class="nav-link" href="dashboard_main.php">Dashboard</a>
          </li>
          <?php }
            if($_SESSION['status'] == 'kasir' || $_SESSION['status'] == 'admin'){
          ?>
          <li>
            <a class="nav-link" href="dashboard_kasir.php">Kasir</a>
          </li>
          <?php }
            if($_SESSION['status'] == 'admin'){
          ?>
          <li>
            <a class="nav-link" href="dashboard_meja.php">Meja</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="dashboard_menu.php">Spesial</a>
              <a class="dropdown-item" href="dashboard_menu_makanan.php">Makanan</a>
              <a class="dropdown-item" href="dashboard_menu_minuman.php">Minuman</a>
            </div>
          </li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Keluar</a>
        </li>
        </ul>
    </div>
    <?php
      }else{
        ?>
        <a class="navbar-brand" href=".">Mororapi Resto</a>
        <?php
      }
    ?>
  </nav>