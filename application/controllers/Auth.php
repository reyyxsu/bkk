<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth'); // Pastikan model M_auth sudah diload
    }

    public function index()
    {
        // Cek jika pengguna sudah login, redirect ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        } else {
            $this->load->view('auth/login');
        }
    }

    public function login() {
        // Cek jika pengguna sudah login, redirect ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        }

        // Validasi input form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        // Jika validasi gagal, kembali ke halaman login
        if ($this->form_validation->run() == FALSE) {
            // Mencegah cache pada halaman login
            $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
            $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
            $this->output->set_header('Pragma: no-cache');
            $this->load->view('auth/login'); // Tampilkan halaman login
        } else {
            // Ambil data dari form
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            // Hash password menggunakan MD5 (sesuaikan jika menggunakan hashing lain)
            $hashed_password = md5($password);
    
            // Cek user di database
            $user = $this->M_auth->get_user($username, $hashed_password);
    
            // Jika user ditemukan dan password cocok
            if ($user) {
                // Set session data
                $userdata = array(
                    'username' => $user->username,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($userdata);
    
                // Redirect ke halaman dashboard admin
                redirect('admin/dashboard');
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Username atau Password salah');
                redirect('auth/login'); // Redirect ke halaman login
            }
        }
    }

    public function logout() {
        // Hapus semua data sesi
        $this->session->sess_destroy();
 
        // Redirect ke halaman login setelah logout
        redirect('auth/login');
    }
}
