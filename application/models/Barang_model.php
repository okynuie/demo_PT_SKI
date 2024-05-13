<?php

class Barang_model extends CI_Model
{
    private $_table = "tbl_barang";

    public $id;
    public $kodebrg;
    public $namabrg;
    public $satuan;
    public $hargabeli;

    public function rules()
    {
        return[
            [
                'field' => 'namabarang',
                'label' => 'Nama Barang',
                'rules' => 'required',
                'errors' => array('required' => 'Nama Barang tidak boleh kosong!'),
            ],
            [
                'field' => 'satuan',
                'label' => 'Satuan',
                'rules' => 'required|alpha',
                'errors' => array(
                    'required' => 'Satuan tidak boleh kosong!',
                    'alpha' => 'Satuan hanya berupa huruf!'
                ),
            ],
        ];
    }

    
    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by("namabrg", "asc");
        $query =  $this->db->get();
        return $query->result_array();
    }

    public function getBy($kodebarang)
    {
        return $this->db->get_where($this->_table, array('kodebrg' => $kodebarang))->row_array();
    }

    public function saveBrg($data)
    {
      $this->kodebrg = $data['kodebarang'];
      $this->namabrg = $data['namabarang'];
      $this->satuan = $data['satuan'];
      $this->hargabeli = $data['hargabeli'];
      return $this->db->insert($this->_table, $this);
    }

    public function updateBrg($data, $oldData)
    {
      $this->kodebrg = $data['kodebarang'];
      $this->namabrg = $data['namabarang'];
      $this->satuan = $data['satuan'];
      $this->hargabeli = $data['hargabeli'];
      return $this->db->update($this->_table, $this, array('id'=>$oldData['id']));
    }

    public function del($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}
