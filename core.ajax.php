<?php

include "init/init.php";

$aksi = $_POST['aksi'];

if($aksi == "tambah_meja"){
    $nomeja = $_POST['nomeja'];
    $kodemeja = $_POST['kodemeja'];
    echo tambahMeja($nomeja,$kodemeja);
}else if($aksi == "ubah_meja"){
    $idmeja = $_POST['idmeja'];
    $nomeja = $_POST['nomeja'];
    $kodemeja = $_POST['kodemeja'];
    if(ubahMeja($idmeja,$nomeja,$kodemeja)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "hapus_meja"){
    $idmeja = $_POST['idmeja'];
    if(hapusMeja($idmeja)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "tambah_menu_makan"){
    var_dump($_FILES['mgambar']);
}else{
    echo "0";
}