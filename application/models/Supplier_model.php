<?php

class Supplier_model extends CI_Model
{
    private $_table = "tbl_supplier";

    public $id;
    public $kodespl;
    public $namaspl;

    public function rules()
    {
        return [
                [ 'field' => 'kodespl', 
                  'label' => 'Kode Supplier',
                  'rules' => 'required',
                  'errors' => array('required' => 'Kode Supplier tidak boleh kosong!'),
                ],
                [ 'field' => 'namasupplier', 
                  'label' => 'Nama Supplier',
                  'rules' => 'required',
                  'errors' => array('required' => 'Nama Supplier tidak boleh kosong!'),
                  ]
        ];
    }
    
    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by("namaspl", "asc");
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function saveSpl()
    {
      $post= $this->input->post();
      $this->kodespl = $post['kodespl'];
      $this->namaspl = $post['namasupplier'];
      return $this->db->insert($this->_table, $this);
    }

    public function del($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}
