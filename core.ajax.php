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

    echo tambahMakanan($nama,$harga,$stok,$gambar);
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
}else if($aksi == "tambah_menu_minum"){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $gambar = $_POST['gambar'];

    echo tambahMinuman($nama,$harga,$stok,$gambar);
}else if($aksi == "ubah_menu_minum"){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    if(isset($_POST['gambar'])){
        $gambar = $_POST['gambar'];
    }else{
        $gambar = '';
    }
    if(ubahMinuman($id,$nama,$harga,$stok,$gambar)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "hapus_menu_minum"){
    $id = $_POST['id'];
    if(hapusMinuman($id)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "ubah_menu_spesial"){
    $oldid = $_POST['oldid'];
    $newid = $_POST['newid'];
    if(normalMenu($oldid)){
        echo spesialMenu($newid);
    }else{
        echo "0";
    }
}else if($aksi == "tambah_pesanan"){
    $nota = $_POST['nota'];
    $idmeja = $_POST['idmeja'];
    $porsi = $_POST['porsi'];
    $idmenu = $_POST['idmenu'];
    if(tambahPesan($nota,$idmeja,$porsi,$idmenu)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "hapus_pesanan"){
    $id = $_POST['id'];
    if(batalPesan1($id)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "selesai_masak"){
    $nota = $_POST['nota'];
    if(selesaiMasak($nota)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "batal_pesan"){
    $nota = $_POST['nota'];
    if(batalPesan($nota)){
        echo "1";
    }else{
        echo "0";
    }
}else if($aksi == "selesai_bayar"){
    $nota = $_POST['nota'];
    if(selesaiBayar($nota)){
        echo "1";
    }else{
        echo "0";
    }
}else{
    echo "0";
}