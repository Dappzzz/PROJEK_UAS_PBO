<?php
require_once 'Produk.php';

class SepatuCasual extends Produk
{
    private $gaya, $material, $edisi_terbatas, $merek, $gender, $ukuran, $warna;

    public function __construct($id, $nama, $harga, $deskripsi, $stok, $ukuran, $warna, $merek, $gender, $gaya, $material, $edisi_terbatas)
    {
        parent::__construct($id, $nama, $harga, $deskripsi, $stok);
        $this->ukuran = $ukuran;
        $this->warna = $warna;
        $this->merek = $merek;
        $this->gender = $gender;
        $this->gaya = $gaya;
        $this->material = $material;
        $this->edisi_terbatas = $edisi_terbatas;
    }

    public function getKategori()
    {
        return "Casual";
    }
    public function getGaya()
    {
        return $this->gaya;
    }
    public function getMaterial()
    {
        return $this->material;
    }
    public function getEdisiTerbatas()
    {
        return $this->edisi_terbatas;
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
