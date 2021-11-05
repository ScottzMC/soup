<?php

  class Menu extends CI_Controller{

    public function index(){
      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $data['menu_link_type'] = $this->Menu_Model->display_menu_types();
      $data['menu_type'] = $this->Menu_Model->display_menu_list();

      $this->load->view('navigation/nav', $data);
      $this->load->view('menu/menu', $data);
      $this->load->view('navigation/footer');
    }

    public function type($type){
      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

    	$config['total_rows'] = $this->Menu_Model->get_all_menu_type_count();
      	$data['total_count'] = $config['total_rows'];
      	$config['suffix'] = '';

      if($config['total_rows'] > 0) {
        $page_number = $this->uri->segment(3);
        $config['base_url'] = base_url().'menu/type/'.$type;
        if(empty($page_number)){
          $page_number = 1;
        }

        $offset = ($page_number - 1) * $this->pagination->per_page;
        $this->Menu_Model->setPageNumber($this->pagination->per_page);
        $this->Menu_Model->setOffset($offset);

        $this->pagination->cur_page = $offset;
        $this->pagination->initialize($config);

        $data['page_links'] = $this->pagination->create_links();
        $data['type'] = $this->Menu_Model->menu_type($type);
        $data['menu_link_type'] = $this->Menu_Model->display_menu_types();
     }

    	$this->load->view('navigation/nav', $data);
    	$this->load->view('menu/type', $data);
    	$this->load->view('navigation/footer');
    }

  }

?>
