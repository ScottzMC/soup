<?php

  class Offer extends CI_Controller{

    public function index(){
      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $this->load->view('navigation/nav', $data);
      $this->load->view('home/offer');
      $this->load->view('navigation/footer');
    }

  }

?>
