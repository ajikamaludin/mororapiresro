<?php

function run($sql){
    global $db;
    $result = mysqli_query($db,$sql);
    return $result;
}

function cekString($data){
    global $db;
    return mysqli_real_escape_string($db, $data);
}

function login($mUsername,$mPassword){
    $username = cekString($mUsername);
    $password = cekString($mPassword);
    $password = md5($password);
    $sql = "SELECT `username`,`password` FROM users WHERE `username`='$username' AND `password`='$password'";
    global $db;
    if ($hasil = mysqli_query($db, $sql)){
        if(mysqli_num_rows($hasil) == 1){
             return true;
        }else{
             return false;
        }
    }
}

function logout(){
  unset($_SESSION['user']);
  session_destroy();
  return true;
}

function cekSession(){
    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }
}

function tampilMeja(){
    $sql = "SELECT id_meja,no_meja,kode_meja FROM meja";
    $result = run($sql);
    return $result;
}

function tambahMeja($mNoMeja,$mKodeMeja){
    global $db;
    $nomeja = cekString($mNoMeja);
    $kodemeja = cekString($mKodeMeja);
    $sql = "INSERT INTO `meja` (`no_meja`, `kode_meja`) VALUES ('$nomeja', '$kodemeja')";    
    $result = run($sql);
    if($result){
        $last_id = mysqli_insert_id($db);
        return $last_id;
    }else{
        return 'error';
    }
}

function ubahMeja($mIdMeja,$mNoMeja,$mKodeMeja){
    $idmeja = cekString($mIdMeja);
    $nomeja = cekString($mNoMeja);
    $kodemeja = cekString($mKodeMeja);
    $sql = "UPDATE `meja` SET `no_meja` = '$nomeja', `kode_meja` = '$kodemeja' WHERE `meja`.`id_meja` = '$idmeja'";    
    $result = run($sql);
    return $result;
}

function hapusMeja($mIdMeja){
    $idmeja = cekString($mIdMeja);
    $sql = "DELETE FROM `meja` WHERE `meja`.`id_meja` = '$idmeja'";
    $result = run($sql);
    return $result;
}

function tampilMenuFavorit(){
    $sql = "SELECT `id_menu`,`nama`,`gambar`,`harga`,`stok` FROM menu WHERE `status`='1' LIMIT 0,4";
    $result = run($sql);
    return $result;
}

function tampilMenuMakanan(){
    $sql = "SELECT `id_menu`,`nama`,`gambar`,`harga`,`stok` FROM menu WHERE `jenis`='makanan'";
    $result = run($sql);
    return $result;
}

function tampilMenuMinuman(){
    $sql = "SELECT `id_menu`,`nama`,`gambar`,`harga`,`stok` FROM menu WHERE `jenis`='minuman'";
    $result = run($sql);
    return $result;
}

function namaGambar($mNama,$mType){
    $namaGambarPotong = substr($mNama, 0,5);
    $type = substr($mType, 6,3);
    $nama = time().'_'.$namaGambarPotong.".".$type;
    return $nama;
}

function tambahMakanan($mNama,$mHarga,$mStok,$mGambar){
    global $db;
    $nama = cekString($mNama);
    $harga = cekString($mHarga);
    $stok = cekString($mStok);
    $gambar = cekString($mGambar);

    $sql = "INSERT INTO `menu` (`nama`, `gambar`, `jenis`, `harga`, `stok`, `status`) VALUES ('$nama', '$gambar', 'makanan', '$harga', '$stok', '0')";
    $result = run($sql);
    if($result){
        $last_id = mysqli_insert_id($db);
        return $last_id;
    }else{
        return 'error';
    }
}

function ubahMakanan($mId,$mNama,$mHarga,$mStok,$mGambar){
    $id = cekString($mId);
    $nama = cekString($mNama);
    $harga = cekString($mHarga);
    $stok = cekString($mStok);
    $gambar = cekString($mGambar);
    if(empty($gambar)){
        $sql = "UPDATE `menu` SET `nama` = '$nama', `harga` = '$harga', `stok` = '$stok' WHERE `menu`.`id_menu` = '$id'";
        $result = run($sql);
        return $result;
    }else{
        $sql = "UPDATE `menu` SET `nama` = '$nama',`gambar` = '$gambar', `harga` = '$harga', `stok` = '$stok' WHERE `menu`.`id_menu` = '$id'";
        $result = run($sql);
        return $result;
    }
}

function hapusMakanan($mId){
    $id = cekString($mId);
    $sql = "DELETE FROM `menu` WHERE `menu`.`id_menu` = $id";
    $result = run($sql);
    return $result;
}