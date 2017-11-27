<?php
include "views/header.php";


cekSessionPengunjung();
if(logoutPengunjung()){
    unset( $_SESSION['konfirmasi']);
    header('Location: index.php');
}

?>