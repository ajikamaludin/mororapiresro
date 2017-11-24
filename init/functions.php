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
    $nomeja = cekString($mNoMeja);
    $kodemeja = cekString($mKodeMeja);
    $sql = "INSERT INTO `meja` (`no_meja`, `kode_meja`) VALUES ('$nomeja', '$kodemeja')";    $result = run($sql);
    return $result;
}