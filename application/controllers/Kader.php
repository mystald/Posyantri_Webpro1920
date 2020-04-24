<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kader extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('kader_model');
        $this->load->model('mBooking');
        $this->load->model('mJadwal');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function cekSession(){
        if(!$this->session->is_active){
            $this->session->set_flashdata('flash', 'Sesi berakhir');			
			redirect('Main');
			exit;
		} else{
            if($this->session->role == 'pasien'){
                redirect('Pasien');
            } elseif ($this->session->role == 'pengurus') {
                redirect('Pengurus');
            } elseif ($this->session->role == 'kader'){

            } else{
                redirect('Main');
            }
        }
    }
    
    public function index(){
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->username])->row_array();
        $data['title'] = 'Kader' ;

        $this->cekSession();
        $this->load->view('kader/header', $data);
        $this->load->view('kader/sidebar', $data);
        $this->load->view('kader/topbar', $data);
        $this->load->view('kader/index', $data);
        $this->load->view('kader/footer');
    }

    public function dashboard()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->username])->row_array();
        $data['title'] = 'Kader';

        $this->load->view('kader/header', $data);
        $this->load->view('kader/sidebar', $data);
        $this->load->view('kader/topbar', $data);
        $this->load->view('kader/dashboard', $data);
        $this->load->view('kader/footer');
    }

    public function jadwal()
    {
        //$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'jadwal';
        $data['user'] = $this->mJadwal->getAllJadwal();

        $this->load->view('kader/header', $data);
        $this->load->view('kader/sidebar', $data);
        $this->load->view('kader/topbar', $data);
        $this->load->view('kader/jadwal', $data);
        $this->load->view('kader/footer');
        $this->load->model('mJadwal');
    }

    public function tambah_jadwal()
    {
        $data['title'] = 'Tambah Data Jadwal';

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('id_petugas', 'ID Petugas', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('kader/header', $data);
            $this->load->view('kader/sidebar', $data);
            $this->load->view('kader/topbar', $data);
            $this->load->view('kader/tambah_jadwal', $data);
            $this->load->view('kader/footer');
        } else {
            $this->mJadwal->tambah_jadwal();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('kader/jadwal');
        }
    }
    
    public function hapusjadwal($id_jadwal)
    {
        $this->m_jadwal->delete_jadwal($id_jadwal);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('kader/jadwal');
    }

    public function takejadwal($id_jadwal)
    {
        $this->m_jadwal->take_jadwal($id_jadwal);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('kader/jadwal');
    }

    public function detailjadwal($id)
    {
        $data['title'] = 'Detail Data Jadwal';
        $data['user'] = $this->mJadwal->getJadwalByID($id);

        $this->load->view('kader/header', $data);
        $this->load->view('kader/sidebar', $data);
        $this->load->view('kader/topbar', $data);
        $this->load->view('kader/detailjadwal', $data);
        $this->load->view('kader/footer');
    }

    public function updatejadwal($id)
    {
        $data['title'] = 'update Jadwal';
        $data['user'] = $this->mJadwal->getJadwalbyId($id);

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('id_petugas', 'ID Petugas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('kader/header', $data);
            $this->load->view('kader/sidebar', $data);
            $this->load->view('kader/topbar', $data);
            $this->load->view('kader/updatejadwal', $data);
            $this->load->view('kader/footer');
        } else {
            $this->mJadwal->updatejadwal();
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('kader/jadwal');
        }
    }

    public function logout(){
        $this->cekSession();
        $this->session->set_userdata('is_active', false);
        $this->session->set_flashdata('flash', 'Berhasil Logout');	
        redirect('Main');
    }

    public function showjadwal(){
        
    }
}