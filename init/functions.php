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

function cekLogin($mUsername,$mPassword){
    $username = cekString($mUsername);
    $password = cekString($mPassword);
    $password = md5($password);
    $sql = "SELECT `status` FROM users WHERE `username`='$username' AND `password`='$password'";
    $run = run($sql);
    $data = mysqli_fetch_assoc($run);
    return $data['status'];
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

function tampilMenuMakananLimit($limit = 5){
    $sql = "SELECT `id_menu`,`nama`,`gambar`,`harga`,`stok` FROM menu WHERE `jenis`='makanan' LIMIT 0,$limit";
    $result = run($sql);
    return $result;
}

function tampilMenuMinumanLimit($limit = 5){
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
    //update stok di menu - porsi
    $pesan = kurangStok($idmenu,$porsi);
    if($pesan){
        $result = run($sql);
        return $result;
    }
}
function jumlahPesan($mNota){
    $nota = cekString($mNota);
    $sql = "SELECT no_nota FROM transaksi WHERE no_nota = '$nota'";
    $data = run($sql);
    $result = mysqli_num_rows($data);
    return $result;
}

function tampilCheckout($mNota){
    $nota = cekString($mNota);
    $sql = "SELECT `id_transaksi`,`id_menu`,`jml_porsi`,`status` FROM transaksi WHERE `no_nota` = '$nota'";
    $result = run($sql);
    return $result;
}

function tampilNamaMenuBy($mId){
    $id = cekString($mId);
    $sql = "SELECT `nama` FROM `menu` WHERE `id_menu` = '$id'";
    $run = run($sql);
    $result = mysqli_fetch_assoc($run);
    return $result['nama'];
}

function tampilHargaMenuBy($mId){
    $id = cekString($mId);
    $sql = "SELECT `harga` FROM `menu` WHERE `id_menu` = '$id'";
    $run = run($sql);
    $result = mysqli_fetch_assoc($run);
    return $result['harga'];
}

function batalPesan($mNota){
    $nota = cekString($mNota);
    $sql = "SELECT id_transaksi FROM transaksi WHERE no_nota = '$nota'";
    $run = run($sql);
    foreach ($run as $data) {
        $id = $data['id_transaksi'];
        if(batalPesanToDatabase($id)){
            
        }else{
            return;
        }
    }
    $sql = "DELETE FROM transaksi WHERE no_nota = '$nota'";
    $result = run($sql);
    return $result;
}

function batalPesan1($mId){
    $id = cekString($mId);
    if(batalPesanToDatabase($id)){
        $sql = "DELETE FROM transaksi WHERE id_transaksi = '$id'";
        $result = run($sql);
        return $result;
    }
}

function batalPesanToDatabase($id){
    $sql = "SELECT id_menu,jml_porsi FROM transaksi WHERE id_transaksi = '$id'";
    $run = run($sql);
    $data = mysqli_fetch_assoc($run);
    $porsi = $data['jml_porsi'];
    $idmenu = $data['id_menu'];
    return tambahStok($idmenu,$porsi);
}

function konfirmPesan($mNota){
     $nota = cekString($mNota);
     $sql = "UPDATE `transaksi` SET `status` = 'masak' WHERE `transaksi`.`no_nota` = '$nota'";
     $result = run($sql);
     return $result;  
}

function tampilMasak(){
    $sql = "SELECT id_transaksi,no_nota FROM `transaksi` WHERE `status` = 'masak' GROUP BY no_nota";
    $notas = run($sql);
    return $notas;
}

function tampilBayar(){
    $sql = "SELECT no_nota FROM `transaksi` WHERE `status` = 'bayar' OR `status` = 'masak' GROUP BY no_nota";
    $notas = run($sql);
    return $notas;
}

function noNotaToNoMeja($nota){
    $sql = "SELECT id_meja FROM `transaksi` WHERE no_nota='$nota' GROUP BY id_meja";
    $run = run($sql);
    if($run){
        $result = mysqli_fetch_assoc($run);
        $idmeja = $result['id_meja'];
        $sql = "SELECT no_meja FROM meja WHERE id_meja = '$idmeja'";
        $run = run($sql);
        if($run){
            $data = mysqli_fetch_assoc($run);
            $no_meja = $data['no_meja'];
            return $no_meja;
        }else{
            die(print_r('error'));
        }
    }else{
        die(print_r('error'));
    }
    
}

function noNotaToMakanan($nota){
    $sql = "SELECT id_menu FROM `transaksi` WHERE no_nota='$nota' GROUP BY id_menu";
    $run = run($sql);
    foreach ($run as $data) {
        $idmenu = $data['id_menu'];
        $sql = "SELECT nama,harga FROM `menu` WHERE id_menu = '$idmenu'";
        $run = run($sql);
        if($run){
            $data = mysqli_fetch_assoc($run);
            $nama = $data['nama'];
            $harga = $data['harga'];
            $datas[] = array('nama' => $nama, 'id' => $idmenu, 'harga' => $harga);
        }
    }
    return $datas;
}

function idMenuNotaToJumlah($nota,$id){
    $sql = "SELECT jml_porsi FROM `transaksi` WHERE no_nota='$nota' AND id_menu='$id'";
    $run = run($sql);
    $data = mysqli_fetch_assoc($run);
    $jumlah = $data['jml_porsi'];
    return $jumlah;
}

function selesaiMasak($nota){
    $sql = "UPDATE `transaksi` SET `status` = 'bayar' WHERE `transaksi`.`no_nota` = '$nota'";
    return run($sql);
}

function selesaiBayar($mNota){
     $nota = cekString($mNota);
     $sql = "UPDATE `transaksi` SET `status` = 'selesai' WHERE `transaksi`.`no_nota` = '$nota'";
     $result = run($sql);
     return $result;  
}
function getStatus($mNota){
    $sql = "SELECT `status` FROM `transaksi` WHERE `no_nota` = '$mNota' GROUP BY no_nota";
    $result = run($sql);
    $data = mysqli_fetch_assoc($result);
    $status = $data['status'];
    return $status;
}
function kurangStok($id,$porsi){
    $sql = "SELECT `stok` FROM `menu` WHERE `menu`.`id_menu` = $id";
    $run = run($sql);
    $data = mysqli_fetch_assoc($run);
    $stok = $data['stok'] - $porsi;
        if($run){
            $sql = "UPDATE `menu` SET `stok` = '$stok' WHERE `menu`.`id_menu` = '$id'";
            $run = run($sql);
            return $run;
        }
    return false;
}

function tambahStok($id,$porsi){
    $sql = "SELECT `stok` FROM `menu` WHERE `menu`.`id_menu` = $id";
    $run = run($sql);
    $data = mysqli_fetch_assoc($run);
    $stok = $data['stok'] + $porsi;
        if($run){
            $sql = "UPDATE `menu` SET `stok` = '$stok' WHERE `menu`.`id_menu` = '$id'";
            $run = run($sql);
            return $run;
        }
    return false;
}

function updateTimeMeja($time,$kodemeja){
    $lastusagePlus30 = strtotime("+2 minutes", $time);
    $sql = "UPDATE `meja` SET `usage` = '$lastusagePlus30' WHERE `meja`.`kode_meja` = '$kodemeja'";
    $run = run($sql);
    return $run;
}

function cekMeja($time,$kodemeja){
    $sql = "SELECT `usage` FROM meja WHERE kode_meja = '$kodemeja'";
    $run = run($sql);
    $data = mysqli_fetch_assoc($run);
    $lastusage = $data['usage'];
    if($lastusage <= $time){
        return true;
    }else{
        return false;
    }
}

function buangMeja($kodemeja){
    $sql = "UPDATE `meja` SET `usage` = '0' WHERE `meja`.`kode_meja` = '$kodemeja'";
    $run = run($sql);
    return $run;
}