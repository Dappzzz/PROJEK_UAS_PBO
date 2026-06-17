<?php
// File: MODEL/KeranjangModel.php
require_once 'Database.php';

class KeranjangModel extends Database
{

    // Mengambil semua isi keranjang milik user yang sedang login
    public function getKeranjang($id_user)
    {
        $query = "SELECT k.*, s.nama, s.harga, s.gambar, s.stok 
                  FROM keranjang k 
                  JOIN katalog_sepatu s ON k.id_sepatu = s.id 
                  WHERE k.id_user = '$id_user'";
        $result = mysqli_query($this->conn, $query);

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // Menambah sepatu ke keranjang
    public function tambahItem($id_user, $id_sepatu)
    {
        // Cek dulu apakah sepatu ini sudah ada di keranjang
        $cek = mysqli_query($this->conn, "SELECT * FROM keranjang WHERE id_user = '$id_user' AND id_sepatu = '$id_sepatu'");

        if (mysqli_num_rows($cek) > 0) {
            // Jika sudah ada, tambahkan saja jumlahnya (+1)
            $query = "UPDATE keranjang SET jumlah = jumlah + 1 WHERE id_user = '$id_user' AND id_sepatu = '$id_sepatu'";
        } else {
            // Jika belum ada, masukkan sebagai baris baru
            $query = "INSERT INTO keranjang (id_user, id_sepatu, jumlah) VALUES ('$id_user', '$id_sepatu', 1)";
        }
        return mysqli_query($this->conn, $query);
    }

    // Menghapus sepatu dari keranjang
    public function hapusItem($id_user, $id_sepatu)
    {
        $query = "DELETE FROM keranjang WHERE id_user = '$id_user' AND id_sepatu = '$id_sepatu'";
        return mysqli_query($this->conn, $query);
    }
}
