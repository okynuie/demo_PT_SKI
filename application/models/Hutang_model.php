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

    public function getBy($noTransaksi)
    {
        return $this->db->get_where($this->_table, array('notransaksi' => $noTransaksi))->row_array();
    }

    public function saveHutang($data)
    {
        $data_exist = $this->getBy($data['notransaksi']);
        if(!empty($data_exist))
        {
            $this->update($data_exist, $data);
        }else{
            echo('insert');
          $this->notransaksi = $data['notransaksi'];
          $this->kodespl = $data['kodespl'];
          $this->tglbeli = $data['tglbeli'];
          $this->totalhutang = $data['total'];
          return $this->db->insert($this->_table, $this);
        }
    }

    public function update($data, $newdata)
    {
        $this->id=$data['id'];
        $this->notransaksi=$data['notransaksi'];
        $this->kodespl=$data['kodespl'];
        $this->tglbeli=$data['tglbeli'];
        $this->totalhutang=$data['totalhutang']+$newdata['total'];

        echo('update');
        var_dump($data);
        var_dump($newdata);
        return $this->db->update($this->_table, $this, array('id' => $data['id']));
    }

    public function delHutang($id)
    {
        return $this->db->delete($this->_table, array('notransaksi' => $id));
    }

    
}
