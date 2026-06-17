<?php
// File: classes/KatalogToko.php
class KatalogToko
{
    private $nama_toko;
    private $daftar_produk = []; // Array ini yang mewakili Agregasi

    public function __construct($nama_toko)
    {
        $this->nama_toko = $nama_toko;
    }

    public function tambahProduk($produk)
    {
        $this->daftar_produk[] = $produk;
    }

    public function getProdukList()
    {
        return $this->daftar_produk;
    }
}
