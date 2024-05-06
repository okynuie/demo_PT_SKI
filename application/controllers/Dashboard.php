<?php

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    $this->load->model('submenu_model');
  }

  public function index()
  {
    $data['title'] = 'Stoksupplier App';

    $menu = $this->menu_model;
    $submenu = $this->submenu_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getBy('menu_id', 4);

    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('Home', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }

  public function configDemo()
  {
    $data['title'] = 'Setting App';

    $menu = $this->menu_model;
    $submenu = $this->submenu_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();

    $this->load->view('component/Header', $data);
    $this->load->view('setting/Navbar', $data);
    $this->load->view('setting/Topbar', $data);
    $this->load->view('setting/Submenu');
    $this->load->view('setting/Copyright', $data);
    $this->load->view('component/Footer');
  }
}