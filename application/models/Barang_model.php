<?php

class Barang_model extends CI_Model
{
    private $_table = "tbl_barang";

    public $id;
    public $kodebrg;
    public $namabrg;
    public $satuan;
    public $hargabeli;

    
    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by("namabrg", "asc");
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function saveSpl()
    {
      $post= $this->input->post();
      $this->kodebrg = $post['kodebrg'];
      $this->namabrg = $post['namabrg'];
      $this->satuan = $post['satuan'];
      $this->hargabeli = $post['hargabeli'];
      return $this->db->insert($this->_table, $this);
    }

    public function del($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}
