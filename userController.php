<?php
require_once 'koneksi.php';
require_once 'content/models/User.php';

$tombol = $_POST['tombol'];
$id = $_POST['id'];
$aksi = $_POST['aksi'];
$data = [
    $aksi,
    $id
];
$user = new User();

switch ($tombol) {
    case 'upuser':
        $user->updateUser($data);
        break;
    default:
        header('location:admin.php?hal=admin_user');
        break;
}
header('location:admin.php?hal=admin_user');