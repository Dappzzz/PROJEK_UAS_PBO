<?php
// File: models/Database.php

class Database
{
    // Properti private: Enkapsulasi ketat agar kredensial aman dari luar
    private $host = "localhost";
    private $user = "risyadmaulanadaffa"; // Sesuai dengan settingan MySQL kamu
    private $pass = "12345";
    private $db   = "db_tokosepatu";       // Menggunakan database baru untuk UAS

    // Properti protected: Agar bisa dipakai oleh class turunannya (SepatuModel)
    protected $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }
}
