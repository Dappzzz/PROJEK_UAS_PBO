<?php
// File: models/SepatuModel.php
require_once 'Database.php';

// Menerapkan Inheritance: SepatuModel mewarisi class Database
class SepatuModel extends Database
{
    // READ: Menghitung total seluruh sepatu (Untuk Pagination)
    public function getTotalSepatu()
    {
        $query = "SELECT COUNT(*) as total FROM katalog_sepatu";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    // READ: Mengambil data sepatu dengan limit dan offset (Untuk Pagination)
    public function getSepatuPaginated($limit, $offset)
    {
        $query = "SELECT * FROM katalog_sepatu ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $result = mysqli_query($this->conn, $query);

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // READ: Menampilkan semua data sepatu (Masih dipakai untuk Admin)
    public function getAllSepatu()
    {
        $query = "SELECT * FROM katalog_sepatu ORDER BY id DESC";
        $result = mysqli_query($this->conn, $query);

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // READ: Mengambil satu data sepatu spesifik (untuk Edit & Detail)
    public function getSepatuById($id)
    {
        $query = "SELECT * FROM katalog_sepatu WHERE id = '$id'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    // CREATE: Menambah data sepatu baru
    public function tambahSepatu($id, $nama, $harga, $deskripsi, $stok, $ukuran, $warna, $merek, $gender, $tipe, $gambar, $jenis_olahraga = NULL, $teknologi = NULL, $berat_gram = NULL, $bahan = NULL, $tinggi_hak = NULL, $sertifikasi = NULL, $gaya = NULL, $material = NULL, $edisi_terbatas = 0)
    {
        $query = "INSERT INTO katalog_sepatu 
                  (id, nama, harga, deskripsi, stok, ukuran, warna, merek, gender, tipe_sepatu, gambar, jenis_olahraga, teknologi, berat_gram, bahan, tinggi_hak, sertifikasi, gaya, material, edisi_terbatas) 
                  VALUES 
                  ('$id', '$nama', '$harga', '$deskripsi', '$stok', '$ukuran', '$warna', '$merek', '$gender', '$tipe', '$gambar', 
                  " . ($jenis_olahraga ? "'$jenis_olahraga'" : "NULL") . ", 
                  " . ($teknologi ? "'$teknologi'" : "NULL") . ", 
                  " . ($berat_gram ? "'$berat_gram'" : "NULL") . ", 
                  " . ($bahan ? "'$bahan'" : "NULL") . ", 
                  " . ($tinggi_hak ? "'$tinggi_hak'" : "NULL") . ", 
                  " . ($sertifikasi ? "'$sertifikasi'" : "NULL") . ", 
                  " . ($gaya ? "'$gaya'" : "NULL") . ", 
                  " . ($material ? "'$material'" : "NULL") . ", 
                  '$edisi_terbatas')";

        return mysqli_query($this->conn, $query);
    }

    // DELETE: Menghapus data sepatu
    public function hapusSepatu($id)
    {
        $query = "DELETE FROM katalog_sepatu WHERE id = '$id'";
        return mysqli_query($this->conn, $query);
    }

    // UPDATE: Memperbarui data sepatu di database
    public function updateSepatu($id, $nama, $harga, $deskripsi, $stok, $ukuran, $warna, $merek, $gender, $tipe, $gambar, $jenis_olahraga = NULL, $teknologi = NULL, $berat_gram = NULL, $bahan = NULL, $tinggi_hak = NULL, $sertifikasi = NULL, $gaya = NULL, $material = NULL, $edisi_terbatas = 0)
    {
        $query = "UPDATE katalog_sepatu SET 
                  nama = '$nama', harga = '$harga', deskripsi = '$deskripsi', stok = '$stok', 
                  ukuran = '$ukuran', warna = '$warna', merek = '$merek', gender = '$gender', 
                  tipe_sepatu = '$tipe', gambar = '$gambar', 
                  jenis_olahraga = " . ($jenis_olahraga ? "'$jenis_olahraga'" : "NULL") . ", 
                  teknologi = " . ($teknologi ? "'$teknologi'" : "NULL") . ", 
                  berat_gram = " . ($berat_gram ? "'$berat_gram'" : "NULL") . ", 
                  bahan = " . ($bahan ? "'$bahan'" : "NULL") . ", 
                  tinggi_hak = " . ($tinggi_hak ? "'$tinggi_hak'" : "NULL") . ", 
                  sertifikasi = " . ($sertifikasi ? "'$sertifikasi'" : "NULL") . ", 
                  gaya = " . ($gaya ? "'$gaya'" : "NULL") . ", 
                  material = " . ($material ? "'$material'" : "NULL") . ", 
                  edisi_terbatas = '$edisi_terbatas' 
                  WHERE id = '$id'";

        return mysqli_query($this->conn, $query);
    }
}
