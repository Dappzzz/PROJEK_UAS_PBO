<?php
// File: MODEL/UserModel.php
require_once 'Database.php';

class UserModel extends Database
{

    // Mengecek login pengguna
    public function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($this->conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Mengecek kesesuaian password
            if ($password == $user['password']) {
                return $user; // Mengembalikan data user jika berhasil
            }
        }
        return false; // Gagal login
    }

    // Mengecek apakah username sudah ada yang pakai
    public function cekUsernameGanda($username)
    {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_num_rows($result) > 0;
    }

    // Menyimpan data register baru (default role: customer)
    public function register($username, $password, $nama_lengkap)
    {
        $query = "INSERT INTO users (username, password, nama_lengkap, role) 
                  VALUES ('$username', '$password', '$nama_lengkap', 'customer')";
        return mysqli_query($this->conn, $query);
    }
}
