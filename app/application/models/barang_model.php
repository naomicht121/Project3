<?php defined('BASEPATH') OR exit('No direct script access allowed');

class barang_model extends CI_Model
{
    private $_barang = "barang";

    public $id;
    public $nama_barang;
    public $id_gudang;


    public function rules()
    {
        return [
            ['field' => 'nama_barang',
            'label' => 'nama_barang',
            'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->barang)->result();
    }
    
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
        // return $this->db->get_where($this->barang, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
       // $this->id = uniqid();
        $this->nama_kendaraan = $post["nama_kendaraan"];
        return $this->db->insert($this->barang, $this);
    }

    public function update($data, $id)
    {
        return $this->db->update('barang', $data, array('id' => $id));
        // $post = $this->input->post('id');
        // $this->id_kendaraan = $post["id"];
        // $this->name = $post["nama_kendaraan"];
        // $data = $this->input->post('nama_kendaraan');
        // return $this->db->update($this->barang, $data , array('id_kendaraan' => $post));

    }

    public function delete($id)
    {
        return $this->db->delete($this->barang, array("id" => $id));
    }
    public function add($data){
        $this -> db -> query ("INSERT INTO barang (nama_kendaraan) VALUES ('$data')");
    }
}
