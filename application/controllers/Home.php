<?php

  class Home extends CI_Controller{

    public function index(){
      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $data['home_details'] = $this->Model->display_home_menu();

      $this->load->view('navigation/nav', $data);
      $this->load->view('home/home', $data);
      $this->load->view('navigation/footer');
    }

    // About

    public function about(){
      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $this->load->view('navigation/nav', $data);
      $this->load->view('home/about');
      $this->load->view('navigation/footer');
    }

    // End of About

    // Contact

    public function contact(){
      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $this->load->view('navigation/nav', $data);
      $this->load->view('home/contact');
      $this->load->view('navigation/footer');
    }

    // End of Contact

    // Faq

    public function faq(){
      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $this->load->view('navigation/nav', $data);
      $this->load->view('home/faq');
      $this->load->view('navigation/footer');
    }

    // End of Faq

    public function logout(){
      // destroy session
      $data = array('login' => '', 'uemail' => '', 'status' => '');
      $this->session->unset_userdata($data);
      $this->session->sess_destroy();
      #delete_cookie('remember_me_token', 'http://localhost/ClientProjects/Soup', '/');
      redirect('home');
     }

  }

?>
