<?php
// File: CLASS/Produk.php
class Produk
{
    protected $id;
    protected $nama;
    protected $harga;
    protected $deskripsi;
    protected $stok;
    protected $gambar; // TAMBAHAN: Atribut baru untuk gambar

    public function __construct($id, $nama, $harga, $deskripsi, $stok)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->deskripsi = $deskripsi;
        $this->stok = $stok;
    }

    // TAMBAHAN: Getter & Setter khusus gambar
    public function setGambar($gambar)
    {
        $this->gambar = $gambar;
    }
    public function getGambar()
    {
        return $this->gambar;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNama()
    {
        return $this->nama;
    }
    public function getHarga()
    {
        return $this->harga;
    }
    public function getDeskripsi()
    {
        return $this->deskripsi;
    }
    public function getStok()
    {
        return $this->stok;
    }
}
