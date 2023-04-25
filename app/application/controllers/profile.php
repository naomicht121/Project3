<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller

{



	public function index()
	{
		$data['title'] = 'Profile';
		/*$data['user'] = $this->db->get_where('karyawan',['email' =>
		$this->session->userdata('email')])->row_array();*/
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar1', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/footer');
	}

}