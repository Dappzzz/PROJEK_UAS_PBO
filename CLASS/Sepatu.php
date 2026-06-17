<?php
// File: classes/Sepatu.php
require_once 'Produk.php';

class Sepatu extends Produk
{
    protected $ukuran;
    protected $warna;
    protected $merek;
    protected $gender;

    public function __construct($id, $nama, $harga, $deskripsi, $stok, $ukuran, $warna, $merek, $gender)
    {
        parent::__construct($id, $nama, $harga, $deskripsi, $stok);
        $this->ukuran = $ukuran;
        $this->warna = $warna;
        $this->merek = $merek;
        $this->gender = $gender;
    }

    public function getUkuran()
    {
        return $this->ukuran;
    }
    public function getWarna()
    {
        return $this->warna;
    }
    public function getMerek()
    {
        return $this->merek;
    }
    public function getGender()
    {
        return $this->gender;
    }

    // Method dasar untuk Polimorfisme
    public function getKategori()
    {
        return "Sepatu Umum";
    }
}
