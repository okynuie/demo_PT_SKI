<?php

class Stock_model extends CI_Model
{
    private $_table = "tbl_stok";

    public $kodebrg;
    public $qtybeli;
    
    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by("kodebrg", "asc");
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function getBy($value)
    {
      return $this->db->get_where($this->_table, ['kodebrg' => $value])->row_array();
    }

    public function saveStock($data)
    {
      $this->kodebrg = $data['kodebarang'];
      $this->qtybeli = $data['qty'];
      return $this->db->insert($this->_table, $this);
    }

    public function updateStok($data)
    {
        $datalama = $this->getBy($data['kodebarang']);
        if(empty($datalama)){
          $this->kodebrg = $data['kodebarang'];
          $this->qtybeli = $data['qty'];
          return $this->db->insert($this->_table, $this);
        }else{
          $this->kodebrg = $datalama['kodebarang'];
          $this->qtybeli = $datalama['qty'] + $data['qty'];
          return $this->db->update($this->_table, $this, array('kodebrg'=>$data['kodebarang']));
        }
        
        // var_dump($this);
    }

    public function del($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}
