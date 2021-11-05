<?php

  class Shopping extends CI_Controller{

    // Cart 

    public function add(){

      $insert_room = array(
        'id' => $this->input->post('id'),
        'name' => $this->input->post('title'),
        'price' => $this->input->post('price'),
        'qty' => 1,
        'type' => $this->input->post('type')
      );

     $this->cart->insert($insert_room);

     redirect('home');
  }

  public function remove($rowid){
      if($rowid=="all"){
         $this->cart->destroy();
      }else{
      $data = array(
        'rowid'   => $rowid,
        'qty'     => 0
      );

      $this->cart->update($data);
    }

    redirect('home');
  }

    public function update_cart(){
      foreach($_POST['cart'] as $id => $cart){
         $price = $cart['price'];
         $amount = $price * $cart['qty'];
        $this->Model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
    }

    redirect('home');
  }

    // End of Cart 

    // Checkout

    public function checkout(){
      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $email = $this->session->userdata('uemail');
      $data['checkout_details'] = $this->Model->display_checkout_details_by_email($email);

      $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
      $this->form_validation->set_rules('surname', 'Surname', 'trim|required');
      $this->form_validation->set_rules('address', 'Address of Residence', 'trim|required');
      $this->form_validation->set_rules('city', 'City of Residence', 'trim|required');
      $this->form_validation->set_rules('telephone', 'Telephone Number', 'trim|required|min_length[11]');
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|min_length[5]');

      $form_valid = $this->form_validation->run();
      $submit_order = $this->input->post('orderBtn');

      if($form_valid == FALSE){
        $this->load->view('navigation/nav', $data);
        $this->load->view('shopping/checkout', $data);
        $this->load->view('navigation/footer');
      }else if(isset($submit_order)){
        $firstname = $this->input->post('firstname');
        $surname = $this->input->post('surname');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $telephone = $this->input->post('telephone');
        $email = $this->input->post('email');
        $delivery_time = $this->input->post('delivery_time');
        $payment_type = $this->input->post('payment_type');

        $food_title = str_replace(' ','-', $item['name']);

        $shuffle = str_shuffle("ABCDUVXY");
        $unique = rand(000, 999);
        $orderid = $shuffle.$unique;

        if ($cart = $this->cart->contents()):
      foreach ($cart as $item):
        $order_detail = array(
          'order_id'      => $orderid,
          'title'        => $food_title,
          'type'         => $item['type'],
          'quantity'     => $item['qty'],
          'price'        => $item['price'],
          'customer_email' => $email,
          'delivery_time' => $delivery_time,
          'payment_type' => $payment_type,
          'status'       => 'Delivering',
          'created_time' => time(),
          'created_date'  => date('Y-m-j H:i:s')
        );

        $checkout_detail = array(
          'firstname' => $firstname,
          'surname' => $surname,
          'email' => $email,
          'telephone' => $telephone,
          'address' => $address,
          'state' => $city
        );

        $this->Model->insert_order($order_detail);
        $this->Model->update_checkout_details($checkout_detail, $email);
        $this->cart->destroy();
      endforeach;
      endif;

      redirect('home');
      }
    }

    // End of Checkout

    // My Orders

    public function my_orders(){
      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $this->load->view('navigation/nav', $data);
      $this->load->view('shopping/my_orders');
      $this->load->view('navigation/footer');
    }

    // End of Orders

  }

?>
