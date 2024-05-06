<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Stoksupplier App';
    $this->load->view('auth/component/Auth_header', $data);
    $this->load->view('auth/Login', $data);
    $this->load->view('auth/component/Auth_footer');
  }

  public function login()
  {

  }

  public function registration()
  {
    $data['title'] = 'Create an Account';
    $this->load->view('auth/component/Auth_header', $data);
    $this->load->view('auth/Registration', $data);
    $this->load->view('auth/component/Auth_footer');
  }

  public function resetPassword()
  {
    $data['title'] = 'Forgot Your Password?';
    $this->load->view('auth/component/Auth_header', $data);
    $this->load->view('auth/ResetPassword', $data);
    $this->load->view('auth/component/Auth_footer');
  }
}

 