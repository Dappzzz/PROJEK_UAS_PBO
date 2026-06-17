<?php
require_once 'Produk.php';

class SepatuFormal extends Produk
{
    private $bahan, $tinggi_hak, $sertifikasi, $merek, $gender, $ukuran, $warna;

    public function __construct($id, $nama, $harga, $deskripsi, $stok, $ukuran, $warna, $merek, $gender, $bahan, $tinggi_hak, $sertifikasi)
    {
        parent::__construct($id, $nama, $harga, $deskripsi, $stok);
        $this->ukuran = $ukuran;
        $this->warna = $warna;
        $this->merek = $merek;
        $this->gender = $gender;
        $this->bahan = $bahan;
        $this->tinggi_hak = $tinggi_hak;
        $this->sertifikasi = $sertifikasi;
    }

    public function getKategori()
    {
        return "Formal";
    }
    public function getBahan()
    {
        return $this->bahan;
    }
    public function getTinggiHak()
    {
        return $this->tinggi_hak;
    }
    public function getSertifikasi()
    {
        return $this->sertifikasi;
    }
    public function getMerek()
    {
        return $this->merek;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getUkuran()
    {
        return $this->ukuran;
    }
    public function getWarna()
    {
        return $this->warna;
    }
}
