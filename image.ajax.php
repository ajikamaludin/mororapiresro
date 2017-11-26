<?php

include "init/init.php";

if(isset($_FILES['file'])){

    $file = $_FILES['file'];

    $namaGambar = $file['name'];
    $type = $file['type'];
    $namaGambarFix = namaGambar($namaGambar,$type);
    $pathGambar = $file['tmp_name'];
    $simpan = "asset/image/menu/".$namaGambarFix;
    move_uploaded_file($pathGambar, $simpan);

    $error = $file['error'];
    if($error == "0"){
        echo $simpan;
    }else{
        echo $error;
    }

}else{
    echo "gambar kosong";
}