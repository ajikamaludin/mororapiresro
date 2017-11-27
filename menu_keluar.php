<?php
include "views/header.php";


cekSessionPengunjung();
if(logoutPengunjung()){
    header('Location: index.php');
}

?>