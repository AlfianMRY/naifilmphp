<?php
class GenreFilm{
    public $koneksi;

    public function __construct(){
        global $dbh; //panggil instance obj PDO di koneksi_db.php
        $this->koneksi = $dbh; // instance obj PDO di assign ke var koneksi   
    }
    public function all(){
        $sql = "SELECT * from genre_film";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getAll(){
        $sql = "SELECT genre.nama AS nama, film.id AS id 
                FROM genre_film 
                INNER JOIN genre ON genre_film.genre_id = genre.id 
                INNER JOIN film ON genre_film.film_id = film.id";
        //prepare statement PDO

        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function view($genre){
        $sql = "SELECT film.*, genre.nama 
                FROM film
                INNER JOIN genre_film on film.id = genre_film.film_id
                INNER JOIN genre on genre.id = genre_film.genre_id
                where genre.nama = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$genre]);
        $rs = $ps->fetchALL();
        return $rs;
    }
}