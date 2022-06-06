<?php
session_start();
require_once 'koneksi.php';
require_once 'content/models/Rating.php';
$user = $_POST['user_id'];
$film = $_POST['film_id'];
$rate = $_POST['rate'];
$slug = $_POST['slug'];

$data = [
    $user,
    $film,
    $rate
];

$obj = new Rating();
$obj->tambah($data);

header('location:index.php?hal=film_detail&slug='.$slug);