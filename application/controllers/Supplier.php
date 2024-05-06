<?php

class Supplier extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    $this->load->model('submenu_model');
    $this->load->model('supplier_model');
  }

  public function index()
  {
    $data['title'] = 'Supplier';
    $supplier = $this->supplier_model;
    $menu = $this->menu_model;
    $submenu = $this->submenu_model;

    $data['menu'] = $menu->getAllMenu();
    $data['submenu'] = $submenu->getAll();
    $data['supplier'] = $supplier->getAll();

    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('Supplier_v', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }

  public function addSpl()
  {
    $supplier = $this->supplier_model;

    $validation = $this->form_validation;
    $validation->set_rules($supplier->rules());

    if($this->form_validation->run() == false)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Error adding new supplier!
                </div>');
      redirect('supplier/index');
    }else{
      $supplier->saveSpl();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Supplier has been added!
                </div>');
      redirect('supplier/index');
    }
  }

  public function deleteSpl()
  {
    $supplier = $this->supplier_model;
    $id = $this->uri->segment(3);

    $supplier->del($id);
    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Supplier has been deleted!
                </div>');
      redirect('supplier/index');
  }
}