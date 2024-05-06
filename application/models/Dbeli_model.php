<?php

class Dbeli_model extends CI_Model
{
    private $_table = "tbl_dbeli";

    public $id;
    public $notransaksi;
    public $kodebrg;
    public $hargabeli;
    public $qty;
    public $diskon;
    public $diskonrp;
    public $totalrp;

    
    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by("namabrg", "asc");
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function saveBeli($data)
    {
      $this->notransaksi = $data['notransaksi'];
      $this->kodebrg = $data['kodebrg'];
      $this->hargabeli = $data['hargabeli'];
      $this->qty = $data['qty'];
      $this->diskon = $data['diskon'];
      $this->diskonrp = $data['diskonrp'];
      $this->totalrp = $data['totalrp'];
      return $this->db->insert($this->_table, $this);
    }

}
