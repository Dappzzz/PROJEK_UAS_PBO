<?php
require_once 'Produk.php';

class SepatuSport extends Produk
{
    private $jenis_olahraga;
    private $teknologi;
    private $berat_gram;
    private $merek;
    private $gender;
    private $ukuran;
    private $warna;

    public function __construct($id, $nama, $harga, $deskripsi, $stok, $ukuran, $warna, $merek, $gender, $jenis_olahraga, $teknologi, $berat_gram)
    {
        parent::__construct($id, $nama, $harga, $deskripsi, $stok);
        $this->ukuran = $ukuran;
        $this->warna = $warna;
        $this->merek = $merek;
        $this->gender = $gender;
        $this->jenis_olahraga = $jenis_olahraga;
        $this->teknologi = $teknologi;
        $this->berat_gram = $berat_gram;
    }

    // TAMBAHKAN FUNGSI GETTER INI:
    public function getKategori()
    {
        return "Sport";
    }
    public function getJenisOlahraga()
    {
        return $this->jenis_olahraga;
    }
    public function getTeknologi()
    {
        return $this->teknologi;
    }
    public function getBeratGram()
    {
        return $this->berat_gram;
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
