<?php

class Setting extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    $this->load->model('submenu_model');
  }

  public function menu()
  {
    $data['title'] = 'Setting App';
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;
    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();

    $this->load->view('component/Header', $data);
    $this->load->view('setting/Navbar', $data);
    $this->load->view('setting/Topbar', $data);
    $this->load->view('setting/Menu', $data);
    $this->load->view('setting/Copyright', $data);
    $this->load->view('component/Footer');
  }

  public function addMenu()
  {
    $menu = $this->menu_model;
    $validation = $this->form_validation;
    $validation->set_rules($menu->rules());

    if($this->form_validation->run() == false)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Error adding new menu!
                </div>');
      redirect('setting/menu');
    }else{
      $menu->saveMenu();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Menu has been added!
                </div>');
      redirect('setting/menu');
    }
  }

  public function submenu()
  {
    $data['title'] = 'Setting App';
    
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();
    $this->load->view('component/Header', $data);
    $this->load->view('setting/Navbar', $data);
    $this->load->view('setting/Topbar', $data);
    $this->load->view('setting/Submenu', $data);
    $this->load->view('setting/Copyright', $data);
    $this->load->view('component/Footer');
  }

  public function addSubmenu()
  {
    $submenu = $this->submenu_model;
    $validation = $this->form_validation;
    $validation->set_rules($submenu->rules());

    if($this->form_validation->run() == false)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Error adding new submenu!
                </div>');
      redirect('setting/submenu');
    }else{
      $submenu->saveSubmenu();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Submenu has been added!
                </div>');
      redirect('setting/submenu');
    }
  }

  public function editMenu()
  {

  }

  public function editSubmenu()
  {

  }

  public function deleteMenu()
  {
    $menu = $this->menu_model;
    $id = $this->uri->segment(3);

    $menu->del($id);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Menu has been deleted!
                </div>');
      redirect('setting/menu');

  }

  public function deleteSubmenu()
  {

  }
}