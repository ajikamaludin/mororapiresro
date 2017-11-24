<?php

include "init/init.php";

$aksi = $_POST['aksi'];

if($aksi == "tambah_meja"){
    $nomeja = $_POST['nomeja'];
    $kodemeja = $_POST['kodemeja'];
    if(tambahMeja($nomeja,$kodemeja)){
        echo "1";
    }else{
        echo "0";
    }
}else{
    echo "0";
}