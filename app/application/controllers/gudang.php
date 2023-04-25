	
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class gudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("gudang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['gudang'] = $this->gudang_model->getAll();
        $this->load->view("admin/input_gudang", $data);
    }

    public function add()
    {
        $product = $this->gudang_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/gudang");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/gudang');
       
        $product = $this->gudang_model;
         $validation = $this->form_validation;
        // $validation->set_rules($product->rules());

        // if ($validation->run()) {
        // 	$nama = $this->input->post('nama_gudang');
        // 	$id_kendaraan = $this->input->post('id');
        // 	$data = [
        // 		'nama_gudang' => $nama
        // 	];
        //     $product->update($data, $id_kendaraan);
        //     $this->session->set_flashdata('success', 'Berhasil disimpan');
        // }

        $data['gudang'] = $product->getById($id);
        if (!$data['gudang']) show_404();
        
        $this->load->view("admin/edit_gudang", $data);
    }

    public function edit_data()
    {
       
        $product = $this->gudang_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
        	$nama = $this->input->post('nama_gudang');
        	$id_kendaraan = $this->input->post('id');
        	$data = [
        		'nama_gudang' => $nama
        	];
            $product->update($data, $id_kendaraan);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data['gudang'] = $product->getById($id_kendaraan);
        if (!$data['gudang']) show_404();
        
        $this->load->view("admin/edit_gudang", $data);
    }


    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->gudang_model->delete($id)) {
            redirect(site_url('admin/gudang'));
        }
    }
}
