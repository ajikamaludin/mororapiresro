<?php
include "views/header.php";


cekSessionPengunjung();
if(konfirmPesan($_SESSION['time'])){
    $_SESSION['konfirmasi'] = 'ok';
    header('Location: index.php');
}

?>