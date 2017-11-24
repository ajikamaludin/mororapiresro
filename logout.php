<?php
include "init/init.php";

cekSession();

if(logout()){
    header('Location: login.php');
}

?>