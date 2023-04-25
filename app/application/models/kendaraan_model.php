<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kendaraan_model extends CI_Model
{
    private $_kendaraan = "kendaraan";

    public $id;
    public $nama_kendaraan;

    public function rules()
    {
        return [
            ['field' => 'nama_kendaraan',
            'label' => 'nama_kendaraan',
            'rules' => 'required']
        ];
    }

    public function get_kendaraan(){
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->join('kendaraan', 'kendaraan.id = pengiriman.id_kendaraan');
        $this->db->join('karyawan', 'karyawan.id_karayawan = pengiriman.id_supir');
        $this->db->join('barang', 'barang.id = pengiriman.id_barang');
        $query = $this->db->get();
        return $query;

    }

    public function getAll()
    {
        return $this->db->get($this->_kendaraan)->result();
    }
    
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('kendaraan');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
        // return $this->db->get_where($this->_kendaraan, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
       // $this->id = uniqid();
        $this->nama_kendaraan = $post["nama_kendaraan"];
        return $this->db->insert($this->_kendaraan, $this);
    }

    public function update($data, $id)
    {
        return $this->db->update('kendaraan', $data, array('id' => $id));
        // $post = $this->input->post('id');
        // $this->id_kendaraan = $post["id"];
        // $this->name = $post["nama_kendaraan"];
        // $data = $this->input->post('nama_kendaraan');
        // return $this->db->update($this->_kendaraan, $data , array('id_kendaraan' => $post));

    }

    public function delete($id)
    {
        return $this->db->delete($this->_kendaraan, array("id" => $id));
    }
    public function add($data){
        $this -> db -> query ("INSERT INTO kendaraan (nama_kendaraan) VALUES ('$data')");
    }
}
