<?php

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Stoksupplier App';
    $this->load->view('component/Header', $data);
    $this->load->view('component/Navbar', $data);
    $this->load->view('component/Topbar', $data);
    $this->load->view('Home', $data);
    $this->load->view('component/Copyright', $data);
    $this->load->view('component/Footer');
  }
}