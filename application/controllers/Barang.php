<?php

class Barang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    $this->load->model('submenu_model');
    $this->load->model('barang_model');
    $this->load->model('stock_model');
  }

  public function index()
  {
    $data['title'] = 'Barang';
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;
    $barang = $this->barang_model;
    $stock = $this->stock_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();
    $data['barang'] = $barang->getAll();
    $data['stock'] = $stock->getAll();

    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('Barang_v', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }
}