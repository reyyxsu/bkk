<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    // Metode untuk mengambil data user dari database berdasarkan username dan password
    public function get_user($username, $password) {
        // Query untuk mencari username dan password di database
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Gunakan MD5 hashing pada password

        // Dapatkan data user
        $query = $this->db->get('users'); // 'users' adalah nama tabel di database

        // Jika ditemukan, kembalikan data user
        if ($query->num_rows() == 1) {
            return $query->row(); // Mengembalikan satu baris data user
        } else {
            return false; // Kembalikan false jika tidak ditemukan
        }
    }
}
