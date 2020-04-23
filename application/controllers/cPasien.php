<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cPasien extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mPasien');
        $this->load->model('mBooking');
        $this->load->model('mJadwal');
        $this->load->helper('url');
        $this->load->library('session');
    }

	public function index()
	{
        $this->cekSession();
		$this->load->view('pasien/header');
        $this->load->view('pasien/main');
        $this->load->view('pasien/footer');
	}

    public function cekSession(){
        if(!$this->session->is_active){
			$this->session->set_flashdata('flash', 'Sesi berakhir');			
			redirect('cMain');
			exit;
		}
    }

	public function logout()
	{
        $this->cekSession();
        $this->session->set_userdata('is_active', false);
        $this->session->set_flashdata('flash', 'Berhasil Logout');	
        redirect('cMain');
    }
    
    public function showJadwalPage(){
        $data['jadwal'] = $this->mJadwal->getAllJadwal();
        $this->load->view('pasien/header');
        $this->load->view('pasien/jadwal', $data);
        $this->load->view('pasien/footer');
    }
}