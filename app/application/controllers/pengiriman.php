<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengiriman extends CI_Controller{

public function pengiriman()
    {
        $judul['title'] = 'Dashboard admin';
        $session['user'] = $this->db->get_where('karyawan',['email' =>
        $this->session->userdata('email')])->row_array();
        $data["pengiriman"] = $this->pengiriman_model->getAll();

        $this->load->view('templates/header', $judul);
        $this->load->view('templates/sidebar',$session);
        $this->load->view('templates/topbar',$session);
        $this->load->view('admin/pengiriman', $data);
        $this->load->view('templates/footer');
    }

}