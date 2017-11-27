<?php
include "views/header.php";


cekSessionPengunjung();
if(batalPesan($_SESSION['time'])){
    header('Location: index.php');
}

?>