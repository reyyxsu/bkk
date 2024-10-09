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
        
        // Setup konfigurasi upload
        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = 2048; // Ukuran maksimal dalam KB (misalnya 2MB)
    
        // Upload Foto Pas
        $this->load->library('upload', $config);
        $foto_pas = $_FILES['foto_pas']['name'];
        if (!empty($foto_pas)) {
            $config['file_name'] = time() . "_" . $foto_pas; // Ganti nama file agar unik
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_pas')) {
                $error = $this->upload->display_errors();
                echo "Upload Gagal: " . $error; die(); // Tampilkan pesan error upload
            } else {
                $foto_pas = $this->upload->data('file_name');
            }
        }
    
        // Upload Foto Ijazah
        $foto_ijazah = $_FILES['foto_ijazah']['name'];
        if (!empty($foto_ijazah)) {
            $config['file_name'] = time() . "_" . $foto_ijazah; // Ganti nama file agar unik
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_ijazah')) {
                $error = $this->upload->display_errors();
                echo "Upload Gagal: " . $error; die(); // Tampilkan pesan error upload
            } else {
                $foto_ijazah = $this->upload->data('file_name');
            }
        }
    
        // Upload Foto SK Kerja
        $foto_sk_kerja = $_FILES['foto_sk_kerja']['name'];

        // Periksa apakah ada file yang diunggah
        if (!empty($foto_sk_kerja)) {
            $config['file_name'] = time() . "_" . $foto_sk_kerja; // Ganti nama file agar unik
            $this->upload->initialize($config);

            // Jika upload gagal
            if (!$this->upload->do_upload('foto_sk_kerja')) {
                $error = $this->upload->display_errors();
                echo "Upload Gagal: " . $error;
                die(); // Tampilkan pesan error upload dan hentikan proses
            } else {
                $foto_sk_kerja = $this->upload->data('file_name');
            }
        } else {
            // Jika tidak ada file yang diunggah, beri nilai kosong atau default
            $foto_sk_kerja = null;
        }

        // Proses penyimpanan data tetap berjalan meskipun foto tidak diunggah
        $data = [
            'foto_sk_kerja' => $foto_sk_kerja,
            // Data lain yang ingin disimpan
        ];

        // Contoh menyimpan data ke database (sesuaikan dengan model Anda)
        $this->model_nama->simpanData($data);

        // Tampilkan pesan sukses atau redirect ke halaman lain
        echo "Data berhasil disubmit!";

    
        // Validasi input kosong
        if (empty($nama) || empty($alamat) || empty($tb) || empty($bb) || empty($pendidikan_terakhir) || empty($foto_pas) || empty($foto_ijazah) || empty($foto_sk_kerja)) {
            $this->session->set_flashdata('error', 'Semua data wajib diisi');
            redirect('siswa/index');
        } else {
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'tb' => $tb,
                'bb' => $bb,
                'pendidikan_terakhir' => $pendidikan_terakhir,
                'foto_pas' => $foto_pas,
                'foto_ijazah' => $foto_ijazah,
                'foto_sk_kerja' => $foto_sk_kerja,
            );
    
            // Masukkan data ke database
            $this->M_siswa->input_data($data, 'data_siswa');
            redirect('siswa/index');
        }
    }
    

    public function hapus($id) {
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

    public function detail($id) {
        // Ambil detail data berdasarkan ID
        $detail = $this->M_siswa->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/siswa_detail', $data);
        $this->load->view('templates/footer');
    }

}
