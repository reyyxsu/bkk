<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	 public function __construct() {
        parent::__construct();
        $this->load->model('M_contact');
    }

	public function index() {
		$data['pesan'] = $this->M_contact->tampil_data()->result();
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/content', $data);
    }

	public function tambah_aksi() {
        $nama_pengirim = $this->input->post('nama_pengirim');
        $email_pengirim = $this->input->post('email_pengirim');
        $subjek_pesan = $this->input->post('subjek_pesan');
        $pesan = $this->input->post('pesan');
        
        // Validasi input kosong
        if (empty($mama_pengirim) || empty($email_pengirim) || empty($subjek_pesan) || empty($pesan)) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi');
            redirect('users/index');
        } else {
            $data = array(
                'nama_pengirim' => $nama_pengirim,
                'email_pengirim' => $email_pengirim,
                'subjek_pesan' => $subjek_pesan,
                'pesan' => $pesan,
            );
    
            // Masukkan data ke database
            $this->M_contact->input_data($data, 'pesan');
            redirect('users/index');
        }
    }
}
