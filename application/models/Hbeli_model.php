<?php

class Hbeli_model extends CI_Model
{
    private $_table = "tbl_hbeli";

    public $id;
    public $notransaksi;
    public $kodespl;
    public $tglbeli;

    
    public function getLast()
    {
        $this->db->from($this->_table);
        $this->db->order_by("notransaksi", "decs");
        $query =  $this->db->get();
        return $query->row_array();
    }

    public function saveSpl($data)
    {
      $this->kodebrg = $data['notransaksi'];
      $this->namabrg = $data['kodespl'];
      $this->satuan = $data['tglbeli'];
      return $this->db->insert($this->_table, $this);
    }

    public function del($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}
