<?php defined('BASEPATH') OR exit('No direct script access allowed');

class gudang_model extends CI_Model
{
    private $_gudang = "gudang";

    public $id;
    public $nama_gudang;

    public function rules()
    {
        return [
            ['field' => 'nama_gudang',
            'label' => 'nama_gudang',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('gudang');
        $query = $this->db->get()->result();
        return $query;
        // return $this->db->get($this->_gudang)->result();
    }
    
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('gudang');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
        // return $this->db->get_where($this->_kendaraan, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
       // $this->id = uniqid();
        $this->nama_gudang = $post["nama_gudang"];
        return $this->db->insert($this->_gudang, $this);
    }

    public function update($data, $id)
    {
        return $this->db->update('gudang', $data, array('id' => $id));
        // $post = $this->input->post('id');
        // $this->id_kendaraan = $post["id"];
        // $this->name = $post["nama_gudang"];
        // $data = $this->input->post('nama_gudang');
        // return $this->db->update($this->_kendaraan, $data , array('id_kendaraan' => $post));

    }

    public function delete($id)
    {
        return $this->db->delete($this->_gudang, array("id" => $id));
    }
    public function add($data){
        $this -> db -> query ("INSERT INTO gudang (nama_gudang) VALUES ('$data')");
    }
    public function getgudangbyid ($id){
      return $data = $this -> db -> query (" SELECT * FROM gudang WHERE id = '$id'")->row_array();
    }

}
