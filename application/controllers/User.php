<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    $this->load->model('submenu_model');
  }

  public function index()
  {
    $data['title'] = 'User Profile';
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getBy('menu_id', 4);

    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('auth/Profile', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }
}