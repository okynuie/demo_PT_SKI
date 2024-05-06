<?php

class Stock_model extends CI_Model
{
    private $_table = "tbl_stok";

    public $kodebrg;
    public $qty;
    
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
      $this->kodebrg = $data['kodebrg'];
      $this->qty = $data['qty'];
      return $this->db->insert($this->_table, $this);
    }

    public function update($data)
    {
        $datalama = $this->getBy($data['kodebrg']);
        if(isEmpty($datalama)){
          $this->kodebrg = $data['kodebrg'];
          $this->qty = $data['qty'];
          return $this->db->insert($this->_table, $this);
        }else{
          $this->kodebrg = $datalama['kodebrg'];
          $this->qty = $datalama['qty'] + $data['qty'];
          return $this->db->update($this->_table, $this, array('kodebrg'=>$data['kodebrg']));
        }
        
        // var_dump($this);
    }

    public function del($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}
