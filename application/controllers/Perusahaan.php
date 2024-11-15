<?php

class Perusahaan extends CI_Controller 
{

    public function __construct() {
        parent::__construct();
        $this->load->model('M_perusahaan');
        $this->load->library('upload'); // Pindah ke sini agar cukup diload sekali
    }

    public function index() {
        $data['perusahaan'] = $this->M_perusahaan->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('perusahaan/v_perusahaan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $nama_perusahaan = $this->input->post('nama_perusahaan', TRUE); // XSS filtering
        $nama_hrd = $this->input->post('nama_hrd', TRUE);
        $telepon_hrd = $this->input->post('telepon_hrd', TRUE);
        $nik = $this->input->post('nik', TRUE);
        $alamat_perusahaan = $this->input->post('alamat_perusahaan', TRUE);
        $email = $this->input->post('email', TRUE);
    
        // Setup konfigurasi upload
        $config['upload_path'] = './assets/foto_perusahaan';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // Ukuran maksimal dalam KB (2MB)
    
        $foto_perusahaan = '';
        $logo_perusahaan = '';
    
        // Upload Foto Perusahaan
        if (!empty($_FILES['foto_perusahaan']['name'])) {
            $config['file_name'] = time() . "_" . $_FILES['foto_perusahaan']['name']; 
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_perusahaan')) {
                $foto_perusahaan = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', 'Upload Foto Gagal: ' . $this->upload->display_errors());
                redirect('perusahaan/index');
                return;
            }
        }
    
        // Upload Logo Perusahaan
        if (!empty($_FILES['logo_perusahaan']['name'])) {
            $config['file_name'] = time() . "_" . $_FILES['logo_perusahaan']['name'];
            $this->upload->initialize($config);
            if ($this->upload->do_upload('logo_perusahaan')) {
                $logo_perusahaan = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', 'Upload Logo Gagal: ' . $this->upload->display_errors());
                redirect('perusahaan/index');
                return;
            }
        }
    
        // Validasi input kosong
        if (empty($nama_perusahaan) || empty($nama_hrd) || empty($telepon_hrd) || empty($nik) || empty($alamat_perusahaan) || empty($email)) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi');
            redirect('perusahaan/index');
            return;
        } else {
            // Data yang akan diinputkan
            $data = array(
                'nama_perusahaan' => $nama_perusahaan,
                'nama_hrd' => $nama_hrd,
                'telepon_hrd' => $telepon_hrd,
                'nik' => $nik,
                'alamat_perusahaan' => $alamat_perusahaan,
                'email' => $email,
                'foto_perusahaan' => $foto_perusahaan,
                'logo_perusahaan' => $logo_perusahaan,
            );
    
            $this->M_perusahaan->input_data($data, 'data_perusahaan');
            $this->session->set_flashdata('success', 'Data perusahaan berhasil ditambahkan');
            redirect('perusahaan/index');
            return;
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
        $id = $this->input->post('id', TRUE); // XSS filtering
        $nama_perusahaan = $this->input->post('nama_perusahaan', TRUE);
        $nama_hrd = $this->input->post('nama_hrd', TRUE);
        $telepon_hrd = $this->input->post('telepon_hrd', TRUE);
        $nik = $this->input->post('nik', TRUE);
        $alamat_perusahaan = $this->input->post('alamat_perusahaan', TRUE);
        $email = $this->input->post('email', TRUE);
    
        // Validasi email
        if (!valid_email($email)) {
            $this->session->set_flashdata('error', 'Format email tidak valid');
            redirect('perusahaan/edit/'.$id);
            return;
        }
    
        if (empty($nama_perusahaan) || empty($nama_hrd) || empty($telepon_hrd) || empty($nik) || empty($alamat_perusahaan) || empty($email)) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi');
            redirect('perusahaan/edit/'.$id);
            return;
        } else {
            $data = array(
                'nama_perusahaan' => $nama_perusahaan,
                'nama_hrd' => $nama_hrd,
                'telepon_hrd' => $telepon_hrd,
                'nik' => $nik,
                'alamat_perusahaan' => $alamat_perusahaan,
                'email' => $email,
            );
    
            $where = array('id' => $id);
    
            $this->M_perusahaan->update_data($where, $data, 'data_perusahaan');
            $this->session->set_flashdata('success', 'Data perusahaan berhasil diperbarui');
            redirect('perusahaan/index');
            return;
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
