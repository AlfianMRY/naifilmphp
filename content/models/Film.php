<?php
class Film{
    public $koneksi;

    public function __construct(){
        global $dbh; //panggil instance obj PDO di koneksi_db.php
        $this->koneksi = $dbh; // instance obj PDO di assign ke var koneksi   
    }

    public function getAll(){
        $sql = "SELECT * FROM film";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function detail($slug){
        $sql = "SELECT * FROM film WHERE slug = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$slug]);
        $rs = $ps->fetch();
        return $rs;
    }
    public function simpan($data, $genre){
        $sql1 = "INSERT INTO film VALUES (NULL,?,?,?,?,?,?,?,?)";
        $ps1 = $this->koneksi->prepare($sql1);
        $ps1->execute($data);

        $sql2 = "SELECT id from film ORDER BY id DESC LIMIT 1";
        $ps2 = $this->koneksi->prepare($sql2);
        $ps2->execute();
        $id = $ps2->fetch();

        foreach ($genre as $g) {
            $sql3 = "INSERT INTO genre_film VALUES (?,?)";
            $ps3 = $this->koneksi->prepare($sql3);
            $data1 = [
                $id['id'],
                $g
            ];
            $ps3->execute($data1);
        }
    }

    public function update($data, $genre, $id){
        $sql1 = "DELETE FROM genre_film WHERE film_id = ?";
        $ps1 = $this->koneksi->prepare($sql1);
        $ps1->execute([$id]);

        $sql2 = "UPDATE film SET judul=?, tahun=?, pembuat=?, slug=?, deskripsi=?, poster=?, link=?, type_film_id=? WHERE id = ?";
        $ps2 = $this->koneksi->prepare($sql2);
        $ps2->execute($data);

        foreach ($genre as $g) {
            $sql3 = "INSERT INTO genre_film VALUES (?,?)";
            $ps3 = $this->koneksi->prepare($sql3);
            $data1 = [
                $id,
                $g
            ];
            $ps3->execute($data1);
        }
    }

    public function hapus($id){
        $sql1 = "DELETE FROM genre_film WHERE film_id = ?";
        $ps1 = $this->koneksi->prepare($sql1);
        $ps1->execute($id);
        
        $sql2 = "DELETE FROM film WHERE id = ?";
        $ps2 = $this->koneksi->prepare($sql2);
        $ps2->execute($id);

    }
}