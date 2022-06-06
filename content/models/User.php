<?php

class User{
    public $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; //panggil instance obj PDO di koneksi_db.php
        $this->koneksi = $dbh; // instance obj PDO di assign ke var koneksi   
    }

    public function getAll(){
        $sql = "SELECT id,nama,email,role FROM user";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function updateUser($data){
        $sql = "UPDATE user SET role = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}