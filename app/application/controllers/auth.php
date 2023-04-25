<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller

{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == false){
		$data['title'] = 'Halaman login';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
		} else{
			//validasi sukses
			$this->_login();
		}
	}


	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$karyawan = $this->db->get_where('karyawan', ['email' => $email])->row_array();
		//jika user ada
		if($karyawan){
			//jika user aktif
			if($karyawan['is_active'] == 1){
				//cekpassword
				if (password_verify($password, $karyawan['password'])) {
					$data =[
						'email' => $karyawan['email'],
						'role_id' => $karyawan['role_id'] 
					];
					$this->session->set_userdata($data);
					if($karyawan['role_id'] == 1){
						redirect('admin');
					}else{
					redirect('user');
					}
				}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  Salah password
</div>');
		redirect('auth');	
				}

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  user belum aktif
</div>');
		redirect('auth');

			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  User belum ada.
</div>');
		redirect('auth');

		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[karyawan.email]',[
			'is_unique' => 'Email ini sudah ada'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password tidak serupa',
			'min_length' => 'passsword terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		if($this->form_validation->run() == false){
		$data['title'] = 'WPU User Registration';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');	
	} else {
		$data = [
			'nama' => htmlspecialchars($this->input->post('name', true)),
			'role_id' => 2,
			'email' => htmlspecialchars($this->input->post('email', true)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'is_active' => 1,
			'date_created' => time()


		];

		$this->db->insert('karyawan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  berhasil regisrasi.
</div>');
		redirect('auth');
	}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
 			berhasil logut.
			</div>');
		redirect('auth');

	}
}