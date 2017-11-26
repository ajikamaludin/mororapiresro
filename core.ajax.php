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
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $gambar = $_POST['gambar'];

    if(tambahMakanan($nama,$harga,$stok,$gambar)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "ubah_menu_makan"){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    if(isset($_POST['gambar'])){
        $gambar = $_POST['gambar'];
    }else{
        $gambar = '';
    }
    if(ubahMakanan($id,$nama,$harga,$stok,$gambar)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "hapus_menu_makan"){
    $id = $_POST['id'];
    if(hapusMakanan($id)){
        echo "1";
    }else{
        echo "0";
    }

}else{
    echo "0";
}