<?php

class Perusahaan extends CI_Controller 
{

    public function __construct() {
        parent::__construct();
        $this->load->model('M_perusahaan');
    }

    public function index() {
        $data['perusahaan'] = $this->M_perusahaan->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perusahaan/v_perusahaan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $nama_hrd = $this->input->post('nama_hrd');
        $telepon_hrd = $this->input->post('telepon_hrd');
        $nik = $this->input->post('nik');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $email = $this->input->post('email');
    
        // Validasi input kosong
        if (empty($nama_perusahaan) || empty($nama_hrd) || empty($telepon_hrd) || empty($nik) || empty($alamat_perusahaan) || empty($email)) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi');
            redirect('perusahaan/index');
        } else {
            $data = array(
                'nama_perusahaan' => $nama_perusahaan,
                'nama_hrd' => $nama_hrd,
                'telepon_hrd' => $telepon_hrd,
                'nik' => $nik,
                'alamat_perusahaan' => $alamat_perusahaan,
                'email' => $email,
            );
    
            $this->M_perusahaan->input_data($data, 'data_perusahaan');
            redirect('perusahaan/index');
        }
    }    
    

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_perusahaan->hapus_data($where, 'data_perusahaan');
        redirect('perusahaan/index');
    }

    public function edit($id) {
        $where = array('id' => $id);
        $data['perusahaan'] = $this->M_perusahaan->edit_data($where, 'data_perusahaan')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perusahaan/perusahaan_edit', $data);
        $this->load->view('templates/footer');
    }

    public function update() {
        // Ambil id dari input form
        $id = $this->input->post('id');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $nama_hrd = $this->input->post('nama_hrd');
        $telepon_hrd = $this->input->post('telepon_hrd'); 
        $nik = $this->input->post('nik');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $email = $this->input->post('email');
    
        // Validasi jika ada input yang kosong
        if (empty($nama_perusahaan) || empty($nama_hrd) || empty($telepon_hrd) || empty($nik) || empty($alamat_perusahaan) || empty($email)) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi');
            redirect('perusahaan/edit/'.$id);  // Redirect kembali ke halaman edit jika ada input kosong
        } else {
            // Data yang akan diupdate
            $data = array(
                'nama_perusahaan' => $nama_perusahaan,
                'nama_hrd' => $nama_hrd,
                'telepon_hrd' => $telepon_hrd,
                'nik' => $nik,
                'alamat_perusahaan' => $alamat_perusahaan,
                'email' => $email,
            );
    
            // Kondisi where berdasarkan id perusahaan
            $where = array('id' => $id);
    
            // Lakukan update data di database
            $this->M_perusahaan->update_data($where, $data, 'data_perusahaan');
            redirect('perusahaan/index');  // Redirect ke halaman index setelah update
        }
    }
    

    public function detail($id)
    {
        // Ambil detail data berdasarkan ID
        $detail = $this->M_perusahaan->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perusahaan/perusahaan_detail', $data);
        $this->load->view('templates/footer');
    }

}
