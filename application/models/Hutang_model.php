<?php

class Hutang_model extends CI_Model
{
    private $_table = "tbl_hutang";

    public $id;
    public $notransaksi;
    public $kodespl;
    public $tglbeli;
    public $totalhutang;

    
    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by("notransaksi", "desc");
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function saveHutang()
    {
      $post= $this->input->post();
      $this->notransaksi = $post['notransaksi'];
      $this->kodespl = $post['kodespl'];
      $this->tglbeli = $post['tanggal'];
      $this->totalhutang = $post['total'];
      return $this->db->insert($this->_table, $this);
    }

    public function del($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}
