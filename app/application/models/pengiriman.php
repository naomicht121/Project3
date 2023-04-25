<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pengiriman_model extends CI_Model
{
    private $_pengiriman = "pengiriman";

    public $id;
    public $alamat;

    public function rules()
    {
        return [
            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_pengiriman)->result();
    }
    
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
        // return $this->db->get_where($this->_pengiriman, ["id" => $id])->row();
    }

    public function get_kendaraan(){
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->join('kendaraan', 'kendaraan.id = pengiriman.id_kendaraan');
        $this->db->join('karyawan', 'karyawan.id_karayawan = pengiriman.id_supir');
        $this->db->join('barang', 'barang.id = pengiriman.id_barang');
        $query = $this->db->get()->row();
        return $query;

    }



    public function save()
    {
        $post = $this->input->post();
       // $this->id = uniqid();
        $this->alamat = $post["alamat"];
        return $this->db->insert($this->_pengiriman, $this);
    }

    public function update($data, $id)
    {
        return $this->db->update('pengiriman', $data, array('id' => $id));
        // $post = $this->input->post('id');
        // $this->id_kendaraan = $post["id"];
        // $this->name = $post["nama_kendaraan"];
        // $data = $this->input->post('nama_kendaraan');
        // return $this->db->update($this->_pengiriman, $data , array('id_kendaraan' => $post));

    }

    public function delete($id)
    {
        return $this->db->delete($this->_pengiriman, array("id" => $id));
    }
}

