<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller

{



	public function index()
	{
		$data['title'] = 'Profil karyawan';
		$data['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar1', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

}