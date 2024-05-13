<?php

class Hbeli_model extends CI_Model
{
    private $_table = "tbl_hbeli";

    public $id;
    public $notransaksi;
    public $kodespl;
    public $tglbeli;

    public function rules()
    {
        return[
            [
                'field' => 'kodespl',
                'label' => 'Kode Supplier',
                'rules' => 'required',
                'errors' => array('required' => 'Kode Supplier tidak boleh kosong!'),
            ],
            [
                'field' => 'tanggalbeli',
                'label' => 'Tanggal Beli',
                'rules' => 'required',
                'errors' => array('required' => 'Tanggal tidak boleh kosong!'),
            ],

        ];

    }
    
    public function getLast()
    {
        $this->db->from($this->_table);
        $this->db->order_by("notransaksi", "decs");
        $query =  $this->db->get();
        return $query->row_array();
    }

    public function getBy($noTransaksi)
    {
        return $this->db->get_where($this->_table, array('notransaksi' => $noTransaksi))->row_array();
    }

    public function getJoin($noTransaksi)
    {
        // join dengan tbl_supplier
        $this->db->select('notransaksi, tglbeli, tbl_supplier.namaspl, tbl_supplier.id');
        $this->db->from($this->_table);
        $this->db->join('tbl_supplier', 'tbl_supplier.kodespl = tbl_hbeli.kodespl');
        $this->db->where('notransaksi', $noTransaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function saveHSpl($data)
    {
        $this->notransaksi = $data['notransaksi'];
        $this->kodespl = $data['kodespl'];
        $this->tglbeli = $data['tglbeli'];
      return $this->db->insert($this->_table, $this);
    }

    public function del($id)
    {
        return $this->db->delete($this->_table, array('notransaksi' => $id));
    }
}
