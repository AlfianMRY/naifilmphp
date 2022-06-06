<?php
require_once 'koneksi.php';
require_once 'content/models/ReqUR.php';

$obj = new ReqUR();
$id = $_POST['id'];
$tombol = $_POST['tombol'];

switch ($tombol) {
    case 'tolak':
        $obj->tolak($id);
        break;
    case 'terima':
        $obj->terima($id);
        break;
    default:
        header('location:admin.php?hal=admin_uprolelist');
        break;
}
header('location:admin.php?hal=admin_uprolelist');