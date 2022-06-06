<?php

require_once 'koneksi.php';
require_once 'content/models/Film.php';

$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul), '-'));
$pembuat = isset($_POST['pembuat']) ? $_POST['pembuat'] : '';
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
$deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';
$poster = isset($_POST['poster']) ? $_POST['poster'] : '';
$link = isset($_POST['link']) ? $_POST['link'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';
$genre = isset($_POST['genre']) ? $_POST['genre'] : '';
$datafilm = [
    $judul,
    $tahun,
    $pembuat,
    $slug,
    $deskripsi,
    $poster,
    $link,
    $type
];

$tombol = $_REQUEST['tombol'];

$obj = new Film();
switch ($tombol) {
    case 'simpan':
        $obj->simpan($datafilm,$genre);
        break;
    case 'update':
        $id = $_POST['id'];
        $datafilm[] = $id;
        $obj->update($datafilm,$genre,$id);
        break;
    case 'hapus':
        unset($datafilm);
        $datafilm[] = $_POST['id'];
        $obj->hapus($datafilm);
        break;
    default:
        # code...
        break;
}

header('location:admin.php?hal=admin_listfilm');