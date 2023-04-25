	
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kendaraan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["kendaraan"] = $this->kendaraan_model->getAll();
        $this->load->view("admin/input_kendaraan", $data);
    }

    public function add()
    {
        $product = $this->kendaraan_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/kendaraan");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kendaraan');
       
        $product = $this->kendaraan_model;
         $validation = $this->form_validation;
        // $validation->set_rules($product->rules());

        // if ($validation->run()) {
        // 	$nama = $this->input->post('nama_kendaraan');
        // 	$id_kendaraan = $this->input->post('id');
        // 	$data = [
        // 		'nama_kendaraan' => $nama
        // 	];
        //     $product->update($data, $id_kendaraan);
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }

        $data['nama'] = $product->getById($id);
        if (!$data['nama']) show_404();
        
        $this->load->view("admin/edit_kendaraan", $data);
    }

    public function edit_data()
    {
       
        $product = $this->kendaraan_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
        	$nama = $this->input->post('nama_kendaraan');
        	$id_kendaraan = $this->input->post('id');
        	$data = [
        		'nama_kendaraan' => $nama
        	];
            $product->update($data, $id_kendaraan);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data['nama'] = $product->getById($id_kendaraan);
        if (!$data['nama']) show_404();
        
        $this->load->view("admin/edit_kendaraan", $data);
    }


    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kendaraan_model->delete($id)) {
            redirect(site_url('admin/kendaraan'));
        }
    }
}
