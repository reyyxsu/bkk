<?php

class Siswa extends CI_Controller 
{

    public function __construct() {
        parent::__construct();
        $this->load->model('M_siswa');
    }

    public function index() {
        $data['siswa'] = $this->M_siswa->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/v_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tb = $this->input->post('tb');
        $bb = $this->input->post('bb');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');

        // Validasi input kosong
        if (empty($nama) || empty($alamat) || empty($tb) || empty($bb) || empty($pendidikan_terakhir)) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi');
            redirect('siswa/index');
        } else {
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'tb' => $tb,
                'bb' => $bb,
                'pendidikan_terakhir' => $pendidikan_terakhir,
            );

            $this->M_siswa->input_data($data, 'data_siswa');
            redirect('siswa/index');
        }
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_siswa->hapus_data($where, 'data_siswa');
        redirect('siswa/index');
    }

    public function edit($id) {
        $where = array('id' => $id);
        $data['siswa'] = $this->M_siswa->edit_data($where, 'data_siswa')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/siswa_edit', $data);
        $this->load->view('templates/footer');
    }

    public function update() {
        // Ambil id dari input form
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tb = $this->input->post('tb');
        $bb = $this->input->post('bb');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
    
        // Validasi jika ada input yang kosong
        if (empty($nama) || empty($alamat) || empty($tb) || empty($bb) || empty($pendidikan_terakhir)) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi');
            redirect('siswa/edit/'.$id);  // Redirect kembali ke halaman edit jika ada input kosong
        } else {
            // Data yang akan diupdate
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'tb' => $tb,
                'bb' => $bb,
                'pendidikan_terakhir' => $pendidikan_terakhir,
            );
    
            // Kondisi where berdasarkan id siswa
            $where = array('id' => $id);
    
            // Lakukan update data di database
            $this->M_siswa->update_data($where, $data, 'data_siswa');
            redirect('siswa/index');  // Redirect ke halaman index setelah update
        }
    }
    

    public function detail($id)
    {
        // Ambil detail data berdasarkan ID
        $detail = $this->M_siswa->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/siswa_detail', $data);
        $this->load->view('templates/footer');
    }

}
