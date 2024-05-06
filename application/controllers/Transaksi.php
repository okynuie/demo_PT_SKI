<?php

class Transaksi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    $this->load->model('submenu_model');
    $this->load->model('supplier_model');
    $this->load->model('hbeli_model');
    $this->load->model('hutang_model');
  }

  public function detailBeli()
  {
    $data['title'] = 'Pembelian';
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;
    $supplier =  $this->supplier_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();
    $data['supplier'] = $supplier->getAll();
    // $data['']

    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('Detail_transaksi', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }

  public function index()
  {
    $data['title'] = 'Pembelian';
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;
    $hutang = $this->hutang_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();
    $data['hutang'] = $hutang->getAll();

    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('Hutang_v', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }

  public function noTransaksi()
  {
    $hbeli = $this->hbeli_model;
    $noTransaksiAkhir = $hbeli->getLast();

    $no = substr($noTransaksiAkhir, 7);
    $noTransaksi = $no + 1;
    return $noTransaksi;
  }

  public function simpanData()
  {
    $post= $this->input->post();
    $data['notransaksi'] = $post['notransaksi'];
    $data['kodespl'] = $post['kodespl'];
    $data['tglbeli'] = $post['tglbeli'];
    $data['kodebrg'] = $post['kodebrg'];
    $data['namabrg'] = $post['namabrg'];
    $data['hargabeli'] = $post['hargabeli'];
    $data['qty'] = $post['qty'];
    $data['satuan'] = $post['satuan'];
    $data['diskon'] = $post['diskon'];
    $data['diskonrp'] = $post['diskonrp'];
    $data['total'] = $post['total'];
  }
}