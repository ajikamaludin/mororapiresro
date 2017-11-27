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

function tambahMinuman($mNama,$mHarga,$mStok,$mGambar){
    global $db;
    $nama = cekString($mNama);
    $harga = cekString($mHarga);
    $stok = cekString($mStok);
    $gambar = cekString($mGambar);

    $sql = "INSERT INTO `menu` (`nama`, `gambar`, `jenis`, `harga`, `stok`, `status`) VALUES ('$nama', '$gambar', 'minuman', '$harga', '$stok', '0')";
    $result = run($sql);
    if($result){
        $last_id = mysqli_insert_id($db);
        return $last_id;
    }else{
        return 'error';
    }
}

function ubahMinuman($mId,$mNama,$mHarga,$mStok,$mGambar){
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

function hapusMinuman($mId){
    $id = cekString($mId);
    $sql = "DELETE FROM `menu` WHERE `menu`.`id_menu` = $id";
    $result = run($sql);
    return $result;
}

function tampilMenuSemua(){
    $sql = "SELECT `id_menu`,`nama`,`gambar`,`harga`,`stok` FROM menu WHERE `status` = '0'";
    $result = run($sql);
    return $result;
}

function normalMenu($mId){
    $id = cekString($mId);
    $sql = "UPDATE `menu` SET `status` = '0' WHERE `menu`.`id_menu` = '$id'";
    $result = run($sql);
    return $result;
}

function spesialMenu($mId){
    $id = cekString($mId);
    $sql = "UPDATE `menu` SET `status` = '1' WHERE `menu`.`id_menu` = '$id'";
    $result = run($sql);
    if($result){
        $sql = "SELECT `nama`,`harga`,`gambar` FROM `menu` WHERE `id_menu` = '$id'";
        $result = run($sql);
        $data = mysqli_fetch_assoc($result);
        return json_encode($data);
    }
}

function loginPengunjung($mKodeMeja){
    $kodemeja = cekString($mKodeMeja);
    $sql = "SELECT `kode_meja` FROM meja WHERE `kode_meja`='$kodemeja'";
    global $db;
    if ($hasil = mysqli_query($db, $sql)){
        if(mysqli_num_rows($hasil) == 1){
             return true;
        }else{
             return false;
        }
    }
}

function logoutPengunjung(){
  unset($_SESSION['time']);
  session_destroy();
  return true;
}

function cekSessionPengunjung(){
    if(!isset($_SESSION['time'])){
        header('Location: index.php');
    }
}

function tampilMenuMakananLimit($limit = 4){
    $sql = "SELECT `id_menu`,`nama`,`gambar`,`harga`,`stok` FROM menu WHERE `jenis`='makanan' LIMIT 0,$limit";
    $result = run($sql);
    return $result;
}

function tampilMenuMinumanLimit($limit = 4){
    $sql = "SELECT `id_menu`,`nama`,`gambar`,`harga`,`stok` FROM menu WHERE `jenis`='minuman' LIMIT 0,$limit";
    $result = run($sql);
    return $result;
}

function tampilIdmeja($mKodeMeja){
    $kodemeja = cekString($mKodeMeja);
    $sql = "SELECT `id_meja` FROM meja WHERE kode_meja = '$kodemeja'";
    $data = run($sql);
    $result = mysqli_fetch_assoc($data);
    return $result['id_meja'];
}
function tambahPesan($mNota,$mIdmeja,$mPorsi,$mIdmenu){
    $nota = cekString($mNota);
    $idmeja = cekString($mIdmeja);
    $porsi = cekString($mPorsi);
    $idmenu = cekString($mIdmenu);
    $sql = "INSERT INTO `transaksi` (`no_nota`, `id_menu`, `jml_porsi`, `id_meja`, `tgl_transaksi`, `status`) VALUES ('$nota', '$idmenu', '$porsi', '$idmeja', CURRENT_TIMESTAMP, 'pesan');";
    $result = run($sql);
    return $result;
}
function jumlahPesan($mNota){
    $nota = cekString($mNota);
    $sql = "SELECT no_nota FROM transaksi WHERE no_nota = '$nota'";
    $data = run($sql);
    $result = mysqli_num_rows($data);
    return $result;
}