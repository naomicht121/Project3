<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller

{

	    public function __construct()
    {
        parent::__construct();
        $this->load->model("kendaraan_model");
        $this->load->model("gudang_model");
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['title'] = 'Dashboard admin';
		$data['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}


	public function kendaraan()
	{
		$judul['title'] = 'Dashboard admin';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$data["kendaraan"] = $this->kendaraan_model->getAll();

		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar',$session);
		$this->load->view('templates/topbar',$session);
		$this->load->view('admin/kendaraan', $data);
		$this->load->view('templates/footer');
	}

 	
    public function profile()
	{
		$data['title'] = 'Profil karyawan';
		$data['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index');
		$this->load->view('templates/footer');
	}


	public function barang()
	{
		$judul['title'] = 'Barang admin';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
	
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
		$this->load->view('admin/barang');
		$this->load->view('templates/footer');
	}

	public function pengiriman()
	{
		$judul['title'] = 'Pengiriman admin';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$data["pengiriman"] = $this->kendaraan_model->get_kendaraan();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
		$this->load->view('admin/pengiriman', $data);
		$this->load->view('templates/footer');
	}

	public function gudang()
	{
		$judul['title'] = 'Gudang admin';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$data["gudang"] = $this->gudang_model->getAll();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
		$this->load->view('admin/gudang', $data);
		$this->load->view('templates/footer');
	}
	public function dashboard()
	{
		$judul['title'] = 'Dashboard';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
		$this->load->view('admin/dashboard');
		$this->load->view('templates/footer');
	}

	public function input_kendaraan()
	{
		$judul['title'] = 'input_kendaraaan';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
		$this->load->view('admin/input_kendaraan');
		$this->load->view('templates/footer');
	}

	public function edit_kendaraan()
	{
		$judul['title'] = 'edit_kendaraaan';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
		$this->load->view('admin/edit_kendaraan');
		$this->load->view('templates/footer');
	}
	public function input_gudang()
	{
		$judul['title'] = 'input_gudang';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
		$this->load->view('admin/input_gudang');
		$this->load->view('templates/footer');
	}
	public function input_pengiriman()
	{
	
		$judul['title'] = 'input_pengiriman';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
		$this->load->view('admin/input_pengiriman');
		$this->load->view('templates/footer');
	}
	public function edit_gudang($id)
	{
		$judul['title'] = 'edit_gudang';
		$session['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		$data['gudang'] = $this -> gudang_model ->getgudangbyid($id);
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $session);
		$this->load->view('templates/topbar', $session);
		$this->load->view('admin/edit_gudang',$data);
		$this->load->view('templates/footer');
	}
	public function gudang_add(){
		$data = $this -> input -> post("nama_gudang");
		$this ->gudang_model -> add($data);
		redirect ('admin/gudang');
	} 
	public function kendaraan_add(){
		$data = $this -> input -> post("nama_kendaraan");
		$this ->kendaraan_model -> add($data);
		redirect ('admin/kendaraan');
	} 
}

