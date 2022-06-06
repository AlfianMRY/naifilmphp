<?php
session_start();
require_once 'koneksi.php';
require_once 'content/models/Member.php';
require_once 'content/models/ReqUR.php';

$obj = new Member();
$tombol = $_POST['tombol'];
if ($tombol == 'login') {
    $user = $_POST['email'];
    $pass = $_POST['password'];
    $data = [
        $user, 
        $pass  
    ];
    $rs = $obj->cekLogin($data);
    if(!empty($rs)){
        $_SESSION['MEMBER'] = $rs;
        header('location:index.php?hal=home');
    }else{
        header('location:index.php?hal=login_gagal');
    }
}elseif ($tombol == 'signup') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if ($password1 == $password2) {
        $role = 'tamu';
        $data = [
            $nama,
            $email,
            $password1,
            $role
        ];
        $obj->signup($data);
        header('location:index.php?hal=login');
    }else{
        header('location:index.php?hal=signin_gagal');
    }
}elseif ($tombol == 'uprole') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $data = [
        $nama,
        $email,
        $id
    ];
    $obj = new ReqUR();
    $obj->reqUpRole($data);
    header('location:index.php');
}