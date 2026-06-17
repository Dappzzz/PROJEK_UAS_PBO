<?php
// File: MODEL/TransaksiModel.php
require_once 'Database.php';

class TransaksiModel extends Database
{

    // Fungsi lengkap untuk memproses Checkout
    public function prosesCheckout($id_user, $nama_penerima, $alamat, $metode_pembayaran)
    {
        // 1. Ambil isi keranjang user
        $queryKeranjang = "SELECT k.*, s.harga, s.stok FROM keranjang k JOIN katalog_sepatu s ON k.id_sepatu = s.id WHERE k.id_user = '$id_user'";
        $resultKeranjang = mysqli_query($this->conn, $queryKeranjang);

        if (mysqli_num_rows($resultKeranjang) == 0) return false; // Keranjang kosong

        // 2. Hitung total harga
        $total_harga = 0;
        $items = [];
        while ($row = mysqli_fetch_assoc($resultKeranjang)) {
            $total_harga += ($row['harga'] * $row['jumlah']);
            $items[] = $row;
        }

        // 3. Buat ID Transaksi acak (misal: TRX-waktu)
        $id_transaksi = 'TRX-' . time();
        $tanggal = date('Y-m-d H:i:s');

        // 4. Masukkan ke tabel transaksi utama
        $queryTrx = "INSERT INTO transaksi (id_transaksi, id_user, tanggal, total_harga, nama_penerima, alamat, metode_pembayaran, status) 
                     VALUES ('$id_transaksi', '$id_user', '$tanggal', '$total_harga', '$nama_penerima', '$alamat', '$metode_pembayaran', 'Lunas')";
        mysqli_query($this->conn, $queryTrx);

        // 5. Masukkan ke detail transaksi & Kurangi Stok Sepatu
        foreach ($items as $item) {
            $id_sepatu = $item['id_sepatu'];
            $jumlah = $item['jumlah'];
            $harga = $item['harga'];

            // Insert detail
            mysqli_query($this->conn, "INSERT INTO detail_transaksi (id_transaksi, id_sepatu, jumlah, harga_satuan) VALUES ('$id_transaksi', '$id_sepatu', '$jumlah', '$harga')");

            // Kurangi stok di katalog sepatu
            mysqli_query($this->conn, "UPDATE katalog_sepatu SET stok = stok - $jumlah WHERE id = '$id_sepatu'");
        }

        // 6. Kosongkan keranjang milik user tersebut
        mysqli_query($this->conn, "DELETE FROM keranjang WHERE id_user = '$id_user'");

        return $id_transaksi;
    }
}
