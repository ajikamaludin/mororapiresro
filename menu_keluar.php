<?php
include "views/header.php";

buangMeja($_SESSION['kode_meja']);
cekSessionPengunjung();
if(logoutPengunjung()){
    unset($_SESSION['konfirmasi']);
    header('Location: index.php');
}

?>