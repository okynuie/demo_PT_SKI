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


    public function rules()
    {
        return[
            [
                'field' => 'kodebarang',
                'label' => 'Kode Barang',
                'rules' => 'required',
                'errors' => array('required' => 'Kode Barang tidak boleh kosong!'),
            ],
            [
                'field' => 'hargabeli',
                'label' => 'Harga Beli',
                'rules' => 'required|numeric',
                'errors' => array(
                    'required' => 'Harga Beli tidak boleh kosong!',
                    'numeric' => 'Harga Beli hanya berupa angka!'
                ),
            ],
            [
                'field' => 'qty',
                'label' => 'Qty',
                'rules' => 'required|numeric',
                'errors' => array(
                    'required' => 'Tanggal tidak boleh kosong!', 'numeric' => 'Harga Beli hanya berupa angka!'
                ),
            ],

            [
                'field' => 'diskon',
                'label' => 'Diskon',
                'rules' => 'required|numeric',
                'errors' => array('required' => 'Diskon tidak boleh kosong!',
                'numeric' => 'Diskon hanya berupa angka!'
                ),
            ],
        ];
    }

    
    public function getAll()
    {
        $this->db->from($this->_table);
        $this->db->order_by("namabrg", "asc");
        $query =  $this->db->get();
        return $query->row_array();
    }

    public function getBy($data)
    {
        return $this->db->get_where($this->_table, array('notransaksi' => $data['notransaksi']))->row_array();
    }

    public function getDetail($noTransaksi)
    {
        // join dengan tbl_barang
        $this->db->select('notransaksi, tbl_barang.namabrg, tbl_dbeli.hargabeli, qty, tbl_barang.satuan, diskon, diskonrp, totalrp');
        $this->db->from($this->_table);
        $this->db->join('tbl_barang', 'tbl_barang.kodebrg = tbl_dbeli.kodebrg');
        $this->db->where('notransaksi', $noTransaksi);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function saveBeli($data)
    {
      $this->notransaksi = $data['notransaksi'];
      $this->kodebrg = $data['kodebarang'];
      $this->hargabeli = $data['hargabeli'];
      $this->qty = $data['qty'];
      $this->diskon = $data['diskon'];
      $this->diskonrp = $data['diskonrp'];
      $this->totalrp = $data['total'];
      return $this->db->insert($this->_table, $this);
    }

    public function cekDbeli($data)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('notransaksi', $data['notransaksi']);
        $this->db->where('kodebrg', $data['kodebarang']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delBeli($noTransaksi)
    {
        return $this->db->delete($this->_table, array('notransaksi' => $noTransaksi));
    }
}
