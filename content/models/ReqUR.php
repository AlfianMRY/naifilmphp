<?php

class ReqUR{
    public $koneksi;
    //member2 konstruktor
    public function __construct(){
        global $dbh; //panggil instance obj PDO di koneksi_db.php
        $this->koneksi = $dbh; // instance obj PDO di assign ke var koneksi   
    }

    public function getAll(){
        $sql = "SELECT * FROM req_ur";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    
    public function getWait(){
        $sql = "SELECT * FROM req_ur WHERE status = 'menunggu'";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function reqUpRole($data){
        $sql = "INSERT INTO req_ur VALUES(NULL,?,?,?,'menunggu')";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function terima($id){
        $sql1 = "UPDATE user SET role = 'admin' WHERE id = ?";
        $ps1 = $this->koneksi->prepare($sql1);
        $ps1->execute([$id]);
        
        $sql2 = "UPDATE req_ur SET status = 'disetujui' WHERE user_id = ?";
        $ps2 = $this->koneksi->prepare($sql2);
        $ps2->execute([$id]);
    }

    public function tolak($id){
        $sql = "UPDATE req_ur SET status = 'ditolak' WHERE user_id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}